<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Accounts Management
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-users"></i> Admin</a></li>
			<li class="active"><i class="fa fa-user-plus"></i> Account Management</a></li>
		</ol>
	</section>
	<br>


	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">List of Accounts</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
			</div>
		</div>

		<div class="box-header with-border">
			<button type="button" onclick="AddAccount()" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> Add Account</button>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body">
							<table id="tblAccounts" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="1">Role</th>
										<th rowspan="1">Username</th>
										<th rowspan="1">Consortium</th>
										<th rowspan="1">Group</th>
										<th rowspan="1">Status</th>
										<th rowspan="1">Created</th>
										<!-- <th rowspan="1" style="width:105px";>Action</th>  -->
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
			<h3 class="box-title">Accounts Entry Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-toggle="collapse" id="zzz" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="collapse" id="collapseExample">
			<form id="form" class="form-horizontal">
				<div class="box-body">

					<div class="form-group">
						<label for="cboConsortium" class="col-sm-2 control-label">Consortium</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-institution "></i>
							</div>
							<select class="form-control select2 redph" id="cboConsortium" name="cboConsortium" style="width: 100%; display: none;">
								<?php foreach($consortia as $consortium): ?>
									<option value="<?php echo $consortium['ConsortiumID']; ?>"><?php echo $consortium['ConsortiumCode']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="txtUsername" class="col-sm-2 control-label">Username</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input type="text" class="form-control redph" id="txtUsername" name="txtUsername">
						</div>
					</div>

	                <!-- <div class="form-group">
	                  <label for="txtFullname" class="col-sm-2 control-label">Full Name</label>
	                  <div class="input-group col-sm-8"">
	                    <div class="input-group-addon">
	                      <i class="fa fa-user"></i>
	                    </div>
	                    <input type="text" class="form-control" id="txtFullname" name="txtFullname">
	                  </div>
	              	</div> -->

	                <!-- <div class="form-group">
	                  <label for="txtEmail" class="col-sm-2 control-label">Email</label>
	                  <div class="input-group col-sm-8"">
	                    <div class="input-group-addon">
	                      <i class="fa fa-envelope"></i>
	                    </div>
	                    <input type="email" class="form-control redph" id="txtEmail" name="txtEmail">
	                  </div>
	              	</div> -->

	              	<div class="form-group">
	              		<label for="txtPassword" class="col-sm-2 control-label">Password</label>
	              		<div class="input-group col-sm-8">
	              			<div class="input-group-addon">
	              				<i class="fa fa-lock"></i>
	              			</div>
	              			<input type="password" class="form-control redph" id="txtPassword" name="txtPassword">
	              		</div>
	              	</div>

	              	<div class="form-group">
	              		<label for="cboRole" class="col-sm-2 control-label">Role</label>
	              		<div class="input-group col-sm-8">
	              			<div class="input-group-addon">
	              				<i class="fa fa-gear"></i>
	              			</div>
	              			<select class="form-control select2 redph" id="cboRole" name="cboRole" style="width: 100%; display: none;">
	              				<?php foreach($roles as $role): ?>
	              					<option value="<?php echo $role['RoleID']; ?>"><?php echo $role['Role']; ?></option>
	              				<?php endforeach; ?>
	              			</select>
	              		</div>
	              	</div>

	              	<div class="form-group">
	              		<label for="cboGroup" class="col-sm-2 control-label">Group</label>
	              		<div class="input-group col-sm-8">
	              			<div class="input-group-addon">
	              				<i class="fa fa-users"></i>
	              			</div>
	              			<select class="form-control select2" id="cboGroup" name="cboGroup" multiple style="width: 100%; display: none;">
	              				<?php foreach($groups as $group): ?>
	              					<option value="<?php echo $group['GroupID']; ?>"><?php echo $group['GroupName']; ?></option>
	              				<?php endforeach; ?>
	              			</select>
	              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkGroup"> Select All</div>
	              		</div>
	              	</div>

	              	<div class="form-group">
	              		<label for="cboStatus" class="col-sm-2 control-label">Status</label>
	              		<div class="input-group col-sm-8">
	              			<div class="input-group-addon">
	              				<i class="fa fa-toggle-on"></i>
	              			</div>
	              			<select class="form-control select2" id="cboStatus" name="cboStatus" style="width: 100%; display: none;">
	              				<option value="active">Active</option>
	              				<option value="inactive">Inactive</option>
	              			</select>
	              		</div>
	              	</div>

	              	<div class="form-group">
	              		<div class="col-sm-offset-2 col-sm-14" >
	              			<input type="hidden" name="txtUserID" id="txtUserID" />
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
		$('#tblAccounts').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_user_table") ?>",
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
				title: 'Accounts Management',
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
				filename: 'Accounts Management',
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
				filename: 'Accounts Management',
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
				filename: 'Accounts Management',
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
				"width": "30%"
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

	function AddAccount()
	{
		clear_fields();
		if(!$( "#form" ).is( ":visible" ))
		{
			$('#zzz').click();
		}
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
			url:"<?php echo site_url("accounts_controller/get_user")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#cboConsortium').val(data.Consortium).change();
				$('#txtUsername').prop('disabled', true);
				$('#txtUsername').val(data.UserName);  

				$('#txtPassword').removeClass('redph');
				$('#txtPassword').attr("placeholder", "Leave this blank if you don't want to change password.");

				$('#cboRole').val(data.RoleID).change(); 
				$('#cboGroup').val(toIntArray(data.GroupID)).change();
				if(toIntArray(data.GroupID).includes(1))
				{
					$('#cboGroup').prop('disabled', true);
					$('#chkGroup').prop('disabled', true);
				}
				$('#cboStatus').val(data.Status).change(); 

				$('#txtUserID').val(data.UserID);  
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

		if(save_method == "add")
		{
			url = "<?php echo site_url('accounts_controller/create_user')?>";
			serialize = $('input').serialize() + "&cboRole=" + $('[name="cboRole"]').val() + "&cboGroup=" + $('[name="cboGroup"]').val() + "&cboConsortium=" + $('[name="cboConsortium"]').val() + "&cboStatus=" + $('[name="cboStatus"]').val() + "&requirepass=yes";
		}
		else
		{
			url = "<?php echo site_url('accounts_controller/update_user')?>";
			serialize = $('input').serialize() + "&cboRole=" + $('[name="cboRole"]').val() + "&cboGroup=" + $('[name="cboGroup"]').val() + "&cboConsortium=" + $('[name="cboConsortium"]').val() + "&cboStatus=" + $('[name="cboStatus"]').val() + "&requirepass=no" + "&txtUsername=" + $('[name="txtUsername"]').val();
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
				} 
				else if(data.status == 'error')
				{
					toastr.error(data.message);
				}
				else if(data.status == 'validation error')
				{
					$('#txtPassword').addClass('redph');
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						data.inputerror[i] == "cboConsortium" ? toastr.error(data.error_string[i]) : null;
						data.inputerror[i] == "cboRole" ? toastr.error(data.error_string[i]) : null;
						data.inputerror[i] == "cboGroup" ? toastr.error(data.error_string[i]) : null;
						data.inputerror[i] == "cboStatus" ? toastr.error(data.error_string[i]) : null;

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
		id = $('#txtUserID').val();

		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					url : "<?php echo site_url('accounts_controller/delete_user')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						toastr.success("Record deleted successfully.");
						logThis(3);
						clear_fields();
					}
				});
			}
		}
	}
	//End delete record

	function logThis(id)
	{
		var serialize;
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtUsername"]').val() + "&modulefeature=Account Management" + "&id=" + id;

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

	function toIntArray(string) {
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
		$('#txtUsername').prop('disabled', false);
		$('#cboRole').val('0').change();
		$('#cboGroup').val('0').change();
		$('#cboConsortium').val('0').change();
		$('#cboStatus').val('0').change();
		$('#cboGroup').prop('disabled', false);
		$('#chkGroup').prop('disabled', false);
		$('#tblAccounts').DataTable().ajax.reload(null, false);

		$('#lblSubmit').text("Submit");

		scroll_top();
		save_method = 'add';
	}
	//End clear fields

	$(".chkbox").change(function() 
	{
		if(this.checked) 
		{
			$('#cboGroup').select2('destroy').find('option').prop('selected', 'selected').end().select2()
		} 
		else 
		{
			$('#cboGroup').select2('destroy').find('option').prop('selected', false).end().select2()
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

</script>
<!-- END SCRIPT -->

<style type="text/css">
table tr td:nth-of-type(2) { 
	cursor: pointer;
}
</style>