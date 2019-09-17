<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Module Management
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-users"></i> Admin</a></li>
			<li class="active"><i class="fa fa-book"></i> Module Management</a></li>
		</ol>
	</section>
	<br>


	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">List of Modules</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
			</div>
		</div>

		<div class="box-header with-border">
			<button type="button" onclick="AddModule()" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> Add Module</button>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body">
							<table id="tblModules" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="1">Module ID</th>
										<th rowspan="1">Module Name</th>
										<!-- <th rowspan="1">Valid Until</th>
											<th rowspan="1">Status</th> -->
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
				<h3 class="box-title">Module Entry Form</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-toggle="collapse" id="zzz" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="collapse" id="collapseExample">
				<form id="form" class="form-horizontal">
					<div class="box-body">

						<div class="form-group">
							<label for="txtModuleName" class="col-sm-2 control-label">Module Name</label>
							<div class="input-group col-sm-8"">
								<div class="input-group-addon">
									<i class="fa fa-users"></i>
								</div>
								<input type="text" class="form-control redph" id="txtModuleName" name="txtModuleName">
							</div>
						</div>

						<!-- <div class="form-group">
						  <label for="cboGroupStatus" class="col-sm-2 control-label">Group Status</label>
						  <div class="input-group col-sm-8"">
						    <div class="input-group-addon">
						      <i class="fa fa-question-circle"></i>
						    </div>
						    <select class="form-control select2" id="cboGroupStatus" name="cboGroupStatus" style="width: 100%; display: none;">
						        <option value="Single-access group">Single-access group</option>
						        <option value="Multi-access group">Multi-access group</option>
						    </select>
						  </div>
						</div>

						<div class="form-group">
						  <label for="cboGroupType" class="col-sm-2 control-label">Group Access Type</label>
						  <div class="input-group col-sm-8"">
						    <div class="input-group-addon">
						      <i class="fa fa-toggle-on"></i>
						    </div>
						    <select class="form-control select2" id="cboGroupType" name="cboGroupType" style="width: 100%; display: none;">
						        <option value="active">Active</option>
						        <option value="inactive">Inactive</option>
						    </select>
						  </div>
						</div>

						<div class="form-group">
						  <label for="txtValidDate" class="col-sm-2 control-label">Valid Until</label>
						  <div class="input-group col-sm-8"">
						    <div class="input-group-addon">
						      <i class="fa fa-calendar"></i>
						    </div>
						    <input type="text" class="form-control datepicker" id="txtValidDate" name="txtValidDate">
						  </div>
						</div>

						<div class="form-group">
						  <label for="cboModule" class="col-sm-2 control-label">Module</label>
						  <div class="input-group col-sm-8">
						    <div class="input-group-addon">
						      <i class="fa fa-book"></i>
						    </div>
						    <select class="form-control select2" id="cboModule" name="cboModule" multiple style="width: 100%; display: none;">
						      <?php foreach($modules as $module): ?>
						          <option value="<?php echo $module['ModuleID']; ?>"><?php echo $module['Module']; ?></option>
						      <?php endforeach; ?>
						    </select>
						    <div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkModule"> Select All</div>
						  </div>
						</div>

						<div class="form-group">
						  <label for="cboConsortium" class="col-sm-2 control-label">Consortium</label>
						  <div class="input-group col-sm-8">
						    <div class="input-group-addon">
						      <i class="fa fa-institution "></i>
						    </div>
						    <select class="form-control select2" id="cboConsortium" name="cboConsortium" multiple style="width: 100%; display: none;">
						      <?php foreach($agencies as $Consortium): ?>
						        <option value="<?php echo $Consortium['ConsortiumID']; ?>"><?php echo $Consortium['ConsortiumCode']; ?></option>
						      <?php endforeach; ?>
						    </select>
						    <div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkConsortium"> Select All</div>
						  </div>
						</div> -->

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-14" >
								<input type="hidden" name="txtModuleID" id="txtModuleID" />
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

	//Load DataTable
	$(document).ready(function() 
	{
		$('#tblModules').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_module_table") ?>",
				type : 'POST',
				dataType:"json" 
			},
			"dom": 'Bfrtip',

			"buttons": 
			[
			{
				extend: 'copy',
				text:      '',
				titleAttr: 'Copy',
     		 	className:'opt_icon opt_icon1c',
				title: 'Modules Management',
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
				filename: 'Modules Management',
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
				filename: 'Modules Management',
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
				filename: 'Modules Management',
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
			]
		});

		$("input").change(function()
		{
			$(this).parent().parent().removeClass('has-error');
	  	// $(this).next().empty();
		});
	});
	//End Load Datatable

	//Load record to edit
	function edit_record(id)
	{
		save_method = 'edit';

		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();

		scroll_top();

		$.ajax(
		{  
			url:"<?php echo site_url("accounts_controller/get_module")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#txtModuleName').val(data.Module);  
				$('#txtModuleID').val(data.ModuleID);  
				$('#lblSubmit').text("Save");
			}  
		});
	}
	//End load record to edit

	//Save new or updated record
	function save_record()
	{
		var url;
		var serialize;

		serialize = $('input').serialize();;

		if(save_method == "add")
		{
			url = "<?php echo site_url('accounts_controller/create_module')?>"
		}
		else
		{
			url = "<?php echo site_url('accounts_controller/update_module')?>"
		}


		$.ajax(
		{  
			url : url,
			type: "POST",
			data: serialize,
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

					// setTimeout(location.reload.bind(location), 2000);
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
		id = $('#txtModuleID').val();

		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					url : "<?php echo site_url('accounts_controller/delete_module')?>/"+id,
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

	function toIntArray(string) {
		var array = string.split(',');
		for(var i = 0 ; i < array.length; i++) {
			array[i] = parseInt(array[i], 10)
		}

		return array;
	}

	function logThis(id)
	{
		var serialize;
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtModuleName"]').val() + "&modulefeature=Module Management" + "&id=" + id;

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

	function AddModule()
	{
		clear_fields();
		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();
		scroll_top();
		$('#lblSubmit').text("Submit");
	}

	//Clear fields
	function clear_fields()
	{
		$('#form')[0].reset();
		$('input').parent().parent().removeClass('has-error');
		$('input').removeAttr('placeholder');
		$('#tblModules').DataTable().ajax.reload(null, false);
		$('#lblSubmit').text("Submit");

		scroll_top();
		save_method = 'add';
	}
	//End clear fields

	$(".chkbox").change(function() 
	{
		if(this.checked) 
		{
			if(this.id == "chkModule")
				$('#cboModule').select2('destroy').find('option').prop('selected', 'selected').end().select2()

			if(this.id == "chkConsortium")
				$('#cboConsortium').select2('destroy').find('option').prop('selected', 'selected').end().select2()
		} 
		else 
		{
			if(this.id == "chkModule")
				$('#cboModule').select2('destroy').find('option').prop('selected', false).end().select2()

			if(this.id == "chkConsortium")
				$('#cboConsortium').select2('destroy').find('option').prop('selected', false).end().select2()
		}
	});

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

</script>
<!-- END SCRIPT -->

<style type="text/css">
	table tr td:first-of-type {
		cursor: pointer;
	}
</style>