<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Change Password
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-gears"></i> Settings</a></li>
			<li class="active"><i class="fa fa-lock"></i> Change Password</a></li>
		</ol>
	</section>
	<br>

	<!-- Main content -->
	<div class="box box-default entry">
		<div class="box-header with-border">
			<h3 class="box-title">Change Password Form</h3>

		</div>
		<!-- /.box-header -->
		<div>
			<form id="form" class="form-horizontal">
				<div class="box-body">

					<div class="form-group">
						<label for="txtUsername" class="col-sm-2 control-label">Username</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input type="text" class="form-control redph" id="txtUsername" name="txtUsername" value="<?php echo $username ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="txtCurrentPass" class="col-sm-2 control-label">Current Password</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-lock"></i>
							</div>
							<input type="password" class="form-control redph" id="txtCurrentPass" name="txtCurrentPass">
						</div>
					</div>

					<div class="form-group">
						<label for="txtNewPass" class="col-sm-2 control-label">New Password</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-lock"></i>
							</div>
							<input type="password" class="form-control redph" id="txtNewPass" name="txtNewPass">
						</div>
					</div>

					<div class="form-group">
						<label for="txtConfirmPass" class="col-sm-2 control-label">Confirm New Password</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-lock"></i>
							</div>
							<input type="password" class="form-control redph" id="txtConfirmPass" name="txtConfirmPass">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-14" >
							<input type="hidden" name="txtUserID" id="txtUserID" value="<?php echo $userid ?>"/>
							<button type="button" class="btn btn-info" onclick="save_record()" id="btnSubmit" name="btnSubmit">Submit</button>
							<button type="button" class="btn" onclick="clear_fields()" id="btnClear" name="btnClear">Clear</button> 
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
	$(document).ready(function() 
	{
		$('#txtUsername').prop('disabled',true);
	});

	//Save new or updated record
	function save_record()
	{
		var serialize;
		serialze = $('input').serialize() + "&txtUsername=" + $('[name="txtUsername"]').val();

		$.ajax(
		{  
			url : "<?php echo site_url('accounts_controller/changepassword')?>",
			type: "POST",
			data: serialze,
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status == 'success')
				{
					toastr.success(data.message);
					logThis(2);
					clear_fields();
					$('input').parent().parent().removeClass('has-error');
					$('input').removeAttr('placeholder');
				} 
				else if(data.status == 'error')
				{
					toastr.error(data.message);
				}
				else if(data.status == 'validation error')
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
			          // $('[id="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
			          
			          $('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
			      	}

			      	scroll_top();
			  	}
			}  
		});
  	}
  //End save new or updated record

	function logThis(id)
	{
		var serialize;
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtUsername"]').val() + "&modulefeature=Change Password" + "&id=" + id;

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

	//Clear fields
	function clear_fields()
	{
		$('#form')[0].reset();
		$('input').parent().parent().removeClass('has-error');
		$('input').removeAttr('placeholder');

		scroll_top();
		save_method = 'add';
	}
	//End clear fields

	$("input").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#btnSubmit").click();
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
