
<div class="content-wrapper">
	<div class="box box-default entry">
		<div>
			<div class="box-body">
				<div>
					<div class="box-header with-border" style="padding-left: 15px">
						<i class="fa fa-file-text"></i>

						<h3 class="box-title" style="text-align: center;">Inhouse Reports Generation</h3>
					</div>

					<div class="col-md-6">
						<form action="<?php echo site_url("Reports_controller/generate_inhouse")?>" method="post" id="form">
							<div class="box box-primary">
								<div class="box-body">
									<div class="form-group" style="margin-top: 15;">
										<label class="col-sm-3">Report Type:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text"></i>
											</div>
											<select class="form-control select2" id="cboReport" name="cboReport" style="width: 100%;">
					              				<option value="1">List of Publication Title per Series Title</option>
												<option value="2">Total number of Titles per Broad Classification</option>
												<option value="3">Total Number of Cataloged / Uncataloged Titles per Material Type</option>
					              			</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="box box-primary">
					            <div class="box-header">
					              <h3 id="boxtitle" class="box-title" style="font-size: 16px">Inhouse Report</h3>
					            </div>
								<div class="box-body">
									<div class="form-group one">
										<label class="col-sm-3">Series Title:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-book"></i>
											</div>
											<select class="form-control select2" id="cboSeriesTitle" name="cboSeriesTitle" >
												<?php foreach($stitles as $stitle): ?>
													<option value="<?php echo $stitle['Title']; ?>"><?php echo $stitle['Title']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<div class="form-group two" style="display: none">
										<label class="col-sm-3">Broad Class:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
											</div>
											<select class="form-control select2" id="cboBroadClass" name="cboBroadClass[]" multiple style="width: 100%; display: none;">
					              				<?php foreach($bcs as $bc): ?>
					              					<option value="<?php echo $bc['BroadClassID']; ?>"><?php echo $bc['BroadClass']; ?></option>
					              				<?php endforeach; ?>
					              			</select>
					              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkBroadClass"> Select All</div>
										</div>
									</div>

									<div class="form-group two" style="display: none">
										<label class="col-sm-3">From Year:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control year" id="dpFromYear" name="dpFromYear" onchange="onYearChange(1)">
										</div>
									</div>

									<div class="form-group two" style="display: none">
										<label class="col-sm-3">To Year:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control year" id="dpToYear" name="dpToYear" onchange="onYearChange(2)">
										</div>
									</div>

									<div class="form-group three" style="display: none">
										<label class="col-sm-3">Status:</label>
										<div class="input-group">
											<div class="input-group-addon" class="">
												<i class="fa fa-sort"></i>
											</div>
											<select field-type="Select" name="cboStatus" id="cboStatus" class="form-control select2" style="width: 100%;">
												<option value="1">Uncatalog</option>
												<option value="2">Catalog</option>
											</select>
										</div>
									</div>

									<div class="form-group three" style="display: none">
										<label class="col-sm-3">Material Type:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-book"></i>
											</div>
											<select class="form-control select2" id="cboMaterial" name="cboMaterial[]" multiple style="width: 100%; display: none;">
					              				<?php foreach($materials as $material): ?>
					              					<option value="<?php echo $material['MaterialTypeID']; ?>"><?php echo $material['MaterialType']; ?></option>
					              				<?php endforeach; ?>
					              			</select>
					              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkMaterial"> Select All</div>
										</div>
									</div>

									<button type="button" class="btn btn-default pull-right" onclick="clear_data(1)">Clear</button>	
									<!-- <button type="submit" class="btn btn-info pull-right">Generate Report</button>	 -->
									<button type="button" class="btn btn-info pull-right" onclick="load_datatable()">Generate Report</button>	
									
								</div>	
							</div>
						</form>
						<div id="val_errors">
							<?php echo validation_errors(); ?>	
						</div>
					</div>	
				</div>

				<div class="box-body" >
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box-body">
								<table id="dtReport" class="table table-bordered table-striped table-hover">
						        <thead><tr></tr></thead>
						    </table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
			</div>
			</div>
		</div>	
	</div>

	<!-- <div class="box-footer">
	</div> -->
</div>

<script type="text/javascript">
	
	$(document).ready(function()
	{
  		$("#cboMaterial").prop("selectedIndex", -1); 
	});

	$("#cboReport").change(function() 
	{
		if($(this).val() == 1)
		{
			clear_data(2);
			clear_data(3);
			$('.one').show(1000);
			$('.two').hide(1000);
			$('.three').hide(1000);
		}
		else if($(this).val() == 2)
		{
			clear_data(1)
			clear_data(3);
			$('.one').hide(1000);
			$('.two').show(1000);
			$('.three').hide(1000);
		}		
		else
		{
			clear_data(1);
			clear_data(2);
			$('.one').hide(1000);
			$('.two').hide(1000);
			$('.three').show(1000);
		}
	});

	function onYearChange(num)
	{
		if($('#dpFromYear').val() > $('#dpToYear').val() && $('#dpFromYear').val() != "" &&  $('#dpToYear').val() != "")
		{
			toastr.warning("Please choose year accordingly.");
			num == 1 ? $('#dpFromYear').val("") : $('#dpToYear').val("");
			return;
		}
	}

	function load_datatable()
	{
		var report = $('#cboReport').val();
		var rtitle = "";
		var rfilename = "";
		var rmessagetop = "";
		var d = new Date();


		if(report == 1)
		{
			if($('#cboSeriesTitle').val() == "")
			{
				toastr.warning("Please fill out Series Title.");
				return;
			}

			rfilename = "List of Publication_" + $('#cboSeriesTitle').val();
			rtitle = "List of Publication Titles per Series Title " + $('#cboSeriesTitle').val();
		}
		else if(report == 2)
		{
			if(!$('#cboBroadClass').val().length || !$('#dpFromYear').val() || !$('#dpToYear').val())
			{
				toastr.warning("Please fill out Broad Class and years.");
				return;
			}

			rfilename = "Total number of Titles per Broad Classification_" + $('#dpFromYear').val() + "-" + $('#dpToYear').val();
			rtitle = "Total number of Titles per Broad Classification from " + $('#dpFromYear').val() + " to " + $('#dpToYear').val();
		}
		else
		{
			if(!$('#cboMaterial').val().length)
			{
				toastr.warning("Please fill out Material Type.");
				return;
			}

			rfilename = rtitle = $('#cboReport option:selected').text();
		}

		var data,
            tableName= '#dtReport',
            columns,
            rowcount,
            str,
            jqxhr = $.ajax({
            	url:'<?php echo site_url("reports_controller/generate_sheetjs2") ?>',
            	data: $('#form').serialize(),
            	type: "POST",
            	dataType: "json"
            })
            .done(function () {
                data = JSON.parse(jqxhr.responseText);
	            // Iterate each column and print table headers for Datatables
	            $.each(data.columns, function (k, colObj) {
	                str = '<th>' + colObj.name + '</th>';
	                $(str).appendTo(tableName+'>thead>tr');
	            });
	            // Add some Render transformations to Columns
	            // Not a good practice to add any of this in API/ Json side
	            console.log(data.columns);
	            rowcount = data.rows;
	            data.columns[0].render = function (data, type, row) {
	                return '<h4>' + data + '</h4>';
	            }
	            // Debug? console.log(data.columns[0]);

	            var table = $(tableName).dataTable({
	                "data": data.data,
	                "columns": data.columns,
	                "dom": 'Bfrtip',
	                "buttons": [ {
						extend: 'excelHtml5',
						text:      'Download Report',
						filename: rfilename,
						title: rtitle,
						messageTop: rmessagetop,
						
						customize: function(xlsx) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];

							$('row c', sheet).attr('s', '25');
							$('row c', sheet).attr('s', '55');
							$('row c', sheet).attr('s', '50');	
							$('row:first c', sheet).attr('s', '2');	
							$('row c:regex(r,^[A-Z]4$)', sheet).attr('s', '32');

						},
						action: function ( e, dt, node, config ) {
							$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
						}
					},],
					"bFilter" : false,               
					"bLengthChange": false,
					"paging":   false,
					"ordering": false,
					"info":   false,
					
	                "fnInitComplete": function () {
	                    // Event handler to be fired when rendering is complete (Turn off Loading gif for example)
	                    console.log('Datatable rendering complete');
	                    $('.buttons-excel').click();

	                    if ($.fn.dataTable.isDataTable('#dtReport')) {
				        	$('#dtReport').DataTable().buttons().destroy();
				            $('#dtReport').DataTable().clear().destroy();
				            // $('#dtReport').empty(); 
				         	$('#dtReport').find('thead tr th').remove();         
				        }
	                }
	            });        
	        })
	        .fail(function (jqXHR, exception) {
	            var msg = '';
	            if (jqXHR.status === 0) {
	                msg = 'Not connect.\n Verify Network.';
	            } else if (jqXHR.status == 404) {
	                msg = 'Requested page not found. [404]';
	            } else if (jqXHR.status == 500) {
	                msg = 'Internal Server Error [500].';
	            } else if (exception === 'parsererror') {
	                msg = 'Requested JSON parse failed.';
	            } else if (exception === 'timeout') {
	                msg = 'Time out error.';
	            } else if (exception === 'abort') {
	                msg = 'Ajax request aborted.';
	            } else {
	                msg = 'Uncaught Error.\n' + jqXHR.responseText;
	            }
	            console.log(msg);
	        });
	}


	function clear_data(type)
	{
		if(type == 1)
		{
			$('#cboSeriesTitle').val(1).change();
			clear_data(2);
			clear_data(3);
			
		}
		else if(type == 2)
		{
			$('#dpFromYear').val("");
			$('#dpToYear').val("");
			$('#chkBroadClass').prop('checked', false);
			$('#cboBroadClass').select2('destroy').find('option').prop('selected', false).end().select2();
		}
		else
		{
			$('#cboStatus').val(1).change();
			$('#chkMaterial').prop('checked', false);
			$('#cboMaterial').select2('destroy').find('option').prop('selected', false).end().select2();
		}

		$('#val_errors').text("");
	}

	$(".chkbox").change(function() 
	{
		if(this.id == "chkMaterial")
		{
			this.checked ? $('#cboMaterial').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboMaterial').select2('destroy').find('option').prop('selected', false).end().select2();
		}

		if(this.id == "chkBroadClass")
		{
			this.checked ? $('#cboBroadClass').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboBroadClass').select2('destroy').find('option').prop('selected', false).end().select2();
		}
		
	});

	$(document).ready(function()
	{
  		$('.year').inputmask("9999");  
	});

	$('.year').datepicker({
		minViewMode: 2,
		format: 'yyyy',
		autoclose: true,
		orientation: "bottom auto"
	});

</script>

<style type="text/css">
/*.ui-progressbar {
	position: relative;
}

#progresslabel {
	position: absolute;
	top: 4px;
	font-weight: bold;
	text-shadow: 1px 1px 0 #fff;
	text-align: center;
	width: 100%;
}*/
</style>