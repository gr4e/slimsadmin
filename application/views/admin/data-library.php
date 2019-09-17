<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Data Library
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-users"></i> Admin</a></li>
			<li class="active"><i class="fa fa-list"></i> Data Library</a></li>
		</ol>
	</section>
	<br>


	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">Select a data library to modify.</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-header with-border">
			<div class="form-group">
				<label for="cboDataLib" class="col-sm-2 control-label"></label>
				<div class="input-group col-sm-8">
					<div class="input-group-addon">
						<i class="fa fa-list "></i>
					</div>
					<select class="form-control select2" onchange="onDataLibChange()" id="cboDataLib" name="cboDataLib" style="width: 100%; display: none;">
						<option value="0"></option>
						<option value="1">Material Types</option>
						<option value="2">Acquisition Modes</option>
						<option value="3">Broad Class</option>
						<option value="4">Carrier Type</option>
						<option value="5">Content Type</option>
						<option value="6">Media Type</option>
					</select>
				</div>
			</div>     
		</div>

		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body" id="tbl1" style="display: none;">
							<table id="tblDataLib" class="table table-bordered table-striped table-hover" >
								<thead>
									<tr>
										<th rowspan="1">ID</th>
										<th rowspan="1">Description</th>
									</tr> 
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>

						<div class="box-body" id="tbl2" style="display: none;">
							<table id="tblDataLib2" class="table table-bordered table-striped table-hover" >
								<thead>
									<tr>
										<th rowspan="1">ID</th>
										<th rowspan="1">Code</th>
										<th rowspan="1">Description</th>
									</tr> 
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="box-footer">
		</div>   
	</div>
	<div class="box box-default entry">
		<div class="box-header with-border">
			<h3 class="box-title">Data Library Entry Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-toggle="collapse" id="zzz" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<div class="collapse" id="collapseExample">
			<form id="form" class="form-horizontal">
				<div class="box-body">

					<div class="form-group" id="code" style="display: none">
						<label for="txtCode" id="lblCode" class="col-sm-2 control-label"></label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-list"></i>
							</div>
							<input type="text" class="form-control redph" id="txtCode" name="txtCode">
						</div>
					</div>

					<div class="form-group">
						<label for="txtDescription" id="lblDescription" class="col-sm-2 control-label"></label>
						<div class="input-group col-sm-8">
							<div class="input-group-addon">
								<i class="fa fa-list"></i>
							</div>
							<input type="text" class="form-control redph" id="txtDescription" name="txtDescription">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-14" >
							<input type="hidden" name="txtID" id="txtID" />
							<button type="button" class="btn btn-info" onclick="save_record()" id="btnSubmit" name="btnSubmit"><label id="lblSubmit">Submit
								</label></button>
							<button type="button" class="btn" onclick="clear_fields()" id="btnClear" name="btnClear">Clear</button> 
							<button type="button" class="btn btn-warning" style="display: none" onclick="delete_record()" id="btnDelete" name="btnDelete">Delete</button> 
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="box-footer">
		</div>
	</div>
</div>

<!-- SCRIPT -->
<script type="text/javascript">
	var save_method = 'add';
	var type = "";

	//Load DataTable
	$(document).ready(function() 
	{

		$('#tblDataLib').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_datalibrary_table") ?>",
				type : 'POST',
				data:{type:type},
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
				title: 'Data Library',
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
				filename: 'Data Library',
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
				filename: 'Data Library',
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
				filename: 'Data Library',
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

		
		$('#tblDataLib2').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_datalibrary_table") ?>",
				type : 'POST',
				data:{type:type},
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
				title: 'Data Library',
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
				filename: 'Data Library',
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
				filename: 'Data Library',
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
				filename: 'Data Library',
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

	function onDataLibChange()
	{
		type = $('#cboDataLib').val();
		clear_fields();

		if(type == 1)
		{
			$('#tbl1').show();
			$('#tbl2').hide();
			$('#code').hide();
			$('#lblDescription').text("Material Type");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else if(type == 2)
		{
			$('#tbl1').show();
			$('#tbl2').hide();
			$('#code').hide();
			$('#lblDescription').text("Acquisition Mode");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else if(type == 3)
		{
			$('#tbl1').show();
			$('#tbl2').hide();
			$('#code').hide();
			$('#lblDescription').text("Broad Class");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else if(type == 4)
		{
			$('#tbl1').hide();
			$('#tbl2').show();
			$('#lblCode').text("Carrier Type Code");
			$('#code').show();
			$('#lblDescription').text("Carrier Type Term");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else if(type == 5)
		{
			$('#tbl1').hide();
			$('#tbl2').show();
			$('#lblCode').text("Content Type Code");
			$('#code').show();
			$('#lblDescription').text("Content Type Term");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else if(type == 6)
		{
			$('#tbl1').hide();
			$('#tbl2').show();
			$('#lblCode').text("Media Type Code");
			$('#code').show();
			$('#lblDescription').text("Media Type Term");
			if(!$( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
		else
		{
			if($( "#form" ).is( ":visible" ))
				$('#zzz').click();
		}
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
			url:"<?php echo site_url("accounts_controller/get_datalibrary")?>/"+id,  
			method:"POST",  
			data:{id:id, type:$('#cboDataLib').val()},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#txtDescription').val(data.Description); 
				$('#txtCode').val(data.Code);  
				$('#txtID').val(data.ID);  
				$('#lblSubmit').text("Save");

				if($('#cboDataLib').val() == 1)
				{
					if(data.ID >= 1 && data.ID <= 9)
					{
						$('#txtDescription').attr("disabled",true);
						$('#btnSubmit').attr("disabled",true);
						$('#btnClear').attr("disabled",true);
						$('#btnDelete').attr("disabled",true);
					}
				}
				$('#btnDelete').show();
			}  
		});
	}
	//End load record to edit

	//Save new or updated record
	function save_record()
	{
		var url;
		var serialize;

		serialize = $('input').serialize() + "&cboDataLib=" + $('[name="cboDataLib"]').val();

		if(save_method == "add")
		{
			url = "<?php echo site_url('accounts_controller/create_datalibrary')?>"
		}
		else
		{
			url = "<?php echo site_url('accounts_controller/update_datalibrary')?>"
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
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);  
					}

					if($('#cboDataLib').val() >= 4 && $('#cboDataLib').val() <= 6)
					{
						if($('#txtCode').val() == "")
							$('#txtCode').attr("placeholder", "This field is required");  
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
		var serialize;
		id = $('#txtID').val();

		serialize = $('input').serialize() + "&cboDataLib=" + $('[name="cboDataLib"]').val();

		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					url : "<?php echo site_url('accounts_controller/delete_datalibrary')?>/"+id,
					type: "POST",
					data: serialize,
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
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtDescription"]').val() + "&modulefeature=Data Library" + "&id=" + id;

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

	function ReloadDatatable()
	{
		type = $('#cboDataLib').val();
		if(type >= 1 && type <= 3)
		{
			var table = $('#tblDataLib').DataTable();
			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("accounts_controller/load_datalibrary_table") ?>',
				type: "POST",
				dataType: "json",
				data: { type: $('#cboDataLib').val()},
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblDataLib').dataTable().fnAddData( 
							[
							data.data[x].ID,
							data.data[x].Description
							]);
					}
				}     
			});
		}
		else if(type >= 4)
		{
			var table2 = $('#tblDataLib2').DataTable();
			var rows2 = table2
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("accounts_controller/load_datalibrary_table") ?>',
				type: "POST",
				dataType: "json",
				data: { type: $('#cboDataLib').val()},
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblDataLib2').dataTable().fnAddData( 
							[
							data.data[x].ID,
							data.data[x].Code,
							data.data[x].Description
							]);
					}
				}     
			});
		}
	}

	//Clear fields
	function clear_fields()
	{
		ReloadDatatable();
		$('#form')[0].reset();
		$('input').parent().parent().removeClass('has-error');
		$('input').removeAttr('placeholder');
		$('#lblSubmit').text("Submit");

		$('#txtDescription').attr("disabled",false);
		$('#btnSubmit').attr("disabled",false);
		$('#btnClear').attr("disabled",false);
		$('#btnDelete').attr("disabled",false);

		$('#btnDelete').hide();
		//$('#tblDataLib').DataTable().ajax.reload(null, false);

		scroll_top();
		save_method = 'add';
	}
	//End clear fields

	// function AddData()
	// {
	//   var datalib = $('#cboDataLib').val();
	//   if(datalib == "0")
	//   {
	//     toastr.warning("Please select a data library to moodify.")
	//   }
	//   else if(datalib == "1")
	//   {
	//     $('#lblDescription').text("Material Type");
	//     clear_fields();
	//     if(!$( "#form" ).is( ":visible" ))
	//       $('#zzz').click();
	//     scroll_top();
	//   }
	//   else
	//   {
	//     $('#lblDescription').text("Acquisition Mode");
	//     clear_fields();
	//     if(!$( "#form" ).is( ":visible" ))
	//       $('#zzz').click();
	//     scroll_top();
	//   }

	// }

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
table tr td:first-of-type {
	cursor: pointer;
}
</style>