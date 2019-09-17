<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-gears"></i> Settings</a></li>
			<li class="active"><i class="fa fa-user"></i> Update Profile</a></li>
		</ol>
	</section>
	<br>

	<!-- Main content -->
	<div class="box box-default entry">
		<div class="box-header with-border">
			<h3 class="box-title">Update Profile Form</h3>
		</div>
		<!-- /.box-header -->
		<div>
			<?php echo form_open_multipart('accounts_controller/updateprofile'); ?>
				<div class="box-body">

					<img class="post-thumb thumbnail" src="<?php echo base_url()."assets/"; ?>images/<?php echo $image ?>" class="user-image" alt="User Image">

					<br>

					<div class="form-group">
						<label for="txtUsername" class="col-sm-2 control-label" style="text-align: right">Username</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input type="text" class="form-control" id="txtUsername" name="txtUsername">
						</div>
					</div>

					<div class="form-group">
						<label for="txtFullname" class="col-sm-2 control-label" style="text-align: right">Full Name</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input type="text" class="form-control redph" id="txtFullname" name="txtFullname">
						</div>
					</div>

					<div class="form-group">
						<label for="txtPosition" class="col-sm-2 control-label" style="text-align: right">Position/Designation</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-briefcase"></i>
							</div>
							<input type="text" class="form-control" id="txtPosition" name="txtPosition">
						</div>
					</div>

					<div class="form-group">
						<label for="txtEmail" class="col-sm-2 control-label" style="text-align: right">Email</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-envelope"></i>
							</div>
							<input type="email" class="form-control" id="txtEmail" name="txtEmail">
						</div>
					</div>

					<div class="form-group">
						<label for="txtFaxNo" class="col-sm-2 control-label" style="text-align: right">Fax No.</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-tty"></i>
							</div>
							<input type="text" class="form-control" id="txtFaxNo" name="txtFaxNo">
						</div>
					</div>

					<div class="form-group">
						<label for="txtTelNo" class="col-sm-2 control-label" style="text-align: right">Telephone No.</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-phone"></i>
							</div>
							<input type="text" class="form-control" id="txtTelNo" name="txtTelNo">
						</div>
					</div>

					<div class="form-group">
						<label for="txtOfficeAddress" class="col-sm-2 control-label" style="text-align: right">Office Address</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-map"></i>
							</div>
							<input type="text" class="form-control" id="txtOfficeAddress" name="txtOfficeAddress">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" style="text-align: right">Upload Image</label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-file-image-o"></i>
							</div>
							<input type="file" class="form-control" name="userfile" id="userfile">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-14" >
							<input type="hidden" name="txtUserID" id="txtUserID" value="<?php echo $userid ?>"/>
							<button type="submit" class="btn btn-info" id="btnSubmit" name="btnSubmit">Submit</button>
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

		var id = $('#txtUserID').val();

		$.ajax(
		{  
			url:"<?php echo site_url("accounts_controller/get_user")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#txtUsername').val(data.UserName); 
				$('#txtFullname').val(data.LibrarianName); 
				$('#txtPosition').val(data.Position);
				$('#txtEmail').val(data.Email);
				$('#txtFaxNo').val(data.FaxNo);
				$('#txtTelNo').val(data.TelNo);
				$('#txtOfficeAddress').val(data.OfficeAddress);
			}  
		});
	});

	$('#userfile').bind('change', function() {
		var f = this.files[0]

        if (f.size > 5388608 || f.fileSize > 5388608)
        {
           toastr.error("Allowed file size exceeded. (Max. 5 MB)");
 
           this.value = null;
        }
	});

	//Save new or updated record
	// function save_record()
	// {
	//   var serialize;
	//   serialze = $('input').serialize() + "&txtUsername=" + $('[name="txtUsername"]').val();

	//   $.ajax(
	//   {  
	//     url : "<?php echo site_url('accounts_controller/updateprofile')?>",
	//     type: "POST",
	//     data: serialze,
	//     dataType: "JSON",
	//     success:function(data)  
	//     {
	//       if(data.status == 'success')
	//       {
	//         toastr.success(data.message);
	//         logThis(2);
	//         //clear_fields();
	//         // $('input').parent().parent().removeClass('has-error');
	//         // $('input').removeAttr('placeholder');
	//         setTimeout(location.reload.bind(location), 2000);
	//       } 
	//       else if(data.status == 'error')
	//       {
	//         toastr.error(data.message);
	//       }
	//       else if(data.status == 'validation error')
	//       {
	//         for (var i = 0; i < data.inputerror.length; i++) 
	//           { 
	//             $('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
	//           }

	//         scroll_top();
	//       }
	//     }  
	//   });

	// }
	//End save new or updated record

	function logThis(id)
	{
		var serialize;
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtUsername"]').val() + "&modulefeature=Update Profile" + "&id=" + id;

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
		$('#txtFullname').val("");
		$('#txtPosition').val("");
		$('#txtEmail').val("");
		$('#txtFaxNo').val("");
		$('#txtTelNo').val("");
		$('#txtOfficeAddress').val("");
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
