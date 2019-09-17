
<div class="content-wrapper">
	<div class="box box-default entry">
		<div>
			<div class="box-body">
				<div>
					<div class="box-header with-border" style="padding-left: 15px">
						<i class="fa fa-file-text"></i>

						<h3 class="box-title" style="text-align: center;">Inventory and Summary Report Generation</h3>
					</div>

					<div class="col-md-6">
						<form action="<?php echo site_url("Reports_controller/generate_report")?>" method="post" id="form">
							<div class="box box-primary">
								<div class="box-body">
									<div class="form-group" style="margin-bottom: 5;">
										<label class="col-sm-3"></label>
										<div class="row">
											<div class="col-xs-4">
												<div class="radio">
													<label style="font-weight: 700">
														<input type="radio" name="generatedate" value="1" checked="checked">
														Date Inventoried
													</label>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="radio">
													<label style="font-weight: 700">
														<input type="radio" name="generatedate" value="2">
														Date Acquried
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3">From and To:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input id="daterange" name="daterange" type="text" class="form-control pull-right">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3">Inventoried By:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<select class="form-control select2" id="cboUser" name="cboUser[]" multiple style="width: 100%;">
					              				<?php foreach($users as $user): ?>
					              					<option value="<?php echo $user['UserName']; ?>"><?php echo $user['UserName']; ?></option>
					              				<?php endforeach; ?>
					              			</select>
					              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkUser"> Select All</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3">Report Type:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text"></i>
											</div>
											<select class="form-control select2" id="cboReport" name="cboReport" style="width: 100%;">
					              				<option value="1">Inventory Report</option>
					              				<option value="2">Summary Report</option>
					              			</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="box box-primary">
					            <div class="box-header">
					              <h3 id="boxtitle" class="box-title" style="font-size: 16px">Inventory Report</h3>
					            </div>
								<div class="box-body">
									<div class="form-group">
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

									<div class="form-group ir">
										<label class="col-sm-3">Sorted By:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-sort-alpha-asc"></i>
											</div>
											<select class="form-control select2" id="cboSortBy" name="cboSortBy" style="width: 100%">
					              				<option value="callnumber">Call Number</option>
												<option value="Title">Title</option>
												<option value="BroadClass">Broad Class</option>
												<option value="HoldingsID">Holdings ID</option>
												<option value="CirculationNumber">Circulation Number</option>
												<option value="InventoryDate">Date of Inventory</option>
					              			</select>
										</div>
									</div>

									<div class="form-group ir">
										<label class="col-sm-3"></label>
										<div class="input-group">
											<div class="input-group-addon" class="">
												<i class="fa fa-sort"></i>
											</div>
											<select field-type="Select" name="cboSortOrder" id="cboSortOrder" class="form-control select2" style="width: 100%;">
												<option value="ASC">Ascending</option>
												<option value="DESC">Descending</option>
											</select>
										</div>
									</div>

									<div class="form-group sr" style="display: none">
										<label class="col-sm-3">Location:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
											</div>
											<select class="form-control select2" id="cboLocation" name="cboLocation[]" multiple style="width: 100%; display: none;">
					              				<?php foreach($locations as $location): ?>
					              					<option value="<?php echo $location['LocationID']; ?>"><?php echo $location['Location']; ?></option>
					              				<?php endforeach; ?>
					              			</select>
					              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkLocation"> Select All</div>
										</div>
									</div>

									<div class="form-group sr" style="display: none">
										<label class="col-sm-3">Report By:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-mail-forward "></i>
											</div>
											<select class="form-control select2" id="cboReportBy" name="cboReportBy" style="width: 100%">
												<option value="1">Broad Class</option>
												<option value="2">Mode of Acquisition</option>
					              			</select>
										</div>
									</div>

									<div class="form-group sr" style="display: none">
										<label class="col-sm-3">Summary Report Type:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-files-o "></i>
											</div>
											<select class="form-control select2" id="cboSummary" name="cboSummary" style="width: 100%">
												<option value="1">Summary Report</option>
												<option value="2">Overall Summary Report</option>
												<option value="3">Report by Broad Class</option>
												<option value="4">Report by Mode of Acquisition</option>
					              			</select>
										</div>
									</div>

									<input type="hidden" name="txtFrom" id="txtFrom" />
									<input type="hidden" name="txtTo" id="txtTo" />
									<button type="button" class="btn btn-default pull-right" onclick="clear_data(1)">Clear</button>	
									<!-- <button type="submit" class="btn btn-info pull-right">Generate Report</button>	 -->
									<button type="button" class="btn btn-info pull-right" onclick="load_datatable()">Generate Report</button>	
									
								</div>	
							</div>
						</form>
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

	<!-- <div class="box-footer">
	</div> -->
</div>

<script type="text/javascript">
	var from = "";
	var to = "";
	$("#cboMaterial").prop("selectedIndex", -1);

	$(document).ready(function()
	{
  		$('#daterange').inputmask("99/99/9999 - 99/99/9999");  
	});

	$(function() 
	{
		$('#daterange').daterangepicker({
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			}
		});

		$('#daterange').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			$('#txtFrom').val(picker.startDate.format('MM/DD/YYYY'));
			$('#txtTo').val(picker.endDate.format('MM/DD/YYYY'));
		});

		$('#daterange').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});
	});

	$("#cboReport").change(function() 
	{
		if($(this).val() == '1')
		{
			clear_data(3);
			$('.ir').show(1000);
			$('.sr').hide(1000);
		}	
		else
		{
			clear_data(2);
			$('.sr').show(1000);
			$('.ir').hide(1000);
		}
	});


	function load_datatable()
	{
		var report = $('#cboReport').val();
		var summary = $('#cboSummary').val();
		var rtitle = "";
		var rfilename = "";
		var rmessagetop = "";
		var d = new Date();


		if(report == 1)
		{
			if($('#daterange').val() == "" || $('#cboUser').val() == "" || $('#cboMaterial').val() == "")
			{
				toastr.warning("Please fill out From and To date, Inventoried By and Material Type.");
				return;
			}

			rfilename = "Inventory_" + d.mmddyyyy();
			rtitle = "STII LIBRARY INVENTORY OF " + 
				$("#cboMaterial option:selected").map(function () {
			        return $(this).text();
			    }).get().join(', '); 
		}
		else
		{
			if(summary == 1)	
			{
				if($('#cboLocation').val() == "" || $('#cboMaterial').val() == "")
				{
					toastr.warning("Please fill out Location and Material Type.");
					return;
				}

				rfilename = "Summary_" + d.mmddyyyy(); 
				rtitle = "STII Libray Inventory Summary";
			}
			else if(summary == 2)	
			{
				// if($('#cboReportBy').val() == "")
				// {
				// 	toastr.warning("Please fill out Report By.");
				// 	return;
				// }
				rfilename = "OverallSummary_" + d.mmddyyyy();
				rtitle = "Over all Summary of STII Libary Collections";
				rmessagetop = "Per Copyright Year/Publication Year as of " + d.toLocaleString('default', { month: 'long' }) + " " + String(d.getDate()).padStart(2, '0') + ", " + d.getFullYear();

			}
			else if(summary == 3)	
			{
				if($('#daterange').val() == "")
				{
					toastr.warning("Please fill out From and To date.");
					return;
				}

				rfilename = "SummaryBroadClass_" + d.mmddyyyy();
				rtitle = "STII Library Breakdown Report by Broad Class";
			}
			else if(summary == 4)	
			{
				if($('#daterange').val() == "")
				{
					toastr.warning("Please fill out From and To date.");
					return;
				}

				rfilename = "SummaryAcquisitionMode_" + d.mmddyyyy();
				rtitle = "STII Library Breakdown Report by Acquisition Mode";
			
			}
		}

		var data,
            tableName= '#dtReport',
            columns,
            rowcount,
            str,
            jqxhr = $.ajax({
            	url:'<?php echo site_url("reports_controller/generate_sheetjs") ?>',
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
							$('row:first c', sheet).attr('s', '2');			

							if(report == 1)
							{
								$('row c:regex(r,^[A-Z]4$)', sheet).attr('s', '32')
							}
							else
							{
								if(summary == 1)	
								{
									// $('row c', sheet).attr('s', '51');
									$('row:first c', sheet).attr('s', '2');	
									$('c[r=A30] t', sheet).text( 'Year Publication/Copyright Year' );
									// $('c[r=A3] t', sheet).attr('s', '51')
									$('row c:regex(r,^[A-Z]4$)', sheet).attr('s', '32');
									$('row c:regex(r,^[A-Z]5$)', sheet).attr('s', '32');
								}
								else if(summary == 2)	
								{
									$('row c:regex(r,^[A-Z]2$)', sheet).attr('s', '2');
									$('row c:regex(r,^[A-Z]5$)', sheet).attr('s', '32');
									$('row c:regex(r,^[A-Z]' +(rowcount+5)+ '$)', sheet).attr('s', '2');
								}
								else if(summary == 3 || summary == 4)	
								{
									$('row c:regex(r,^[A-Z]4$)', sheet).attr('s', '32');
									$('row* c[r]', sheet).each(function() {
										if ($('is t', this).text().match(/(?:^|\b)(Total No. of Records)(?=\b|$)/gmi)) {
											console.log(this);
											$(this).attr('s', '2');
										}
									});
								}
							}			
							
							// //All cells
							// $('row c', sheet).attr('s', '25');
							// //Second column
							// $('row c:nth-child(2)', sheet).attr('s', '42');
							// //First row
							// $('row:first c', sheet).attr('s', '36');
							// // One cell
							// $('row c[r^="D6"]', sheet).attr('s', '32');
							// //All cells of row 10
							// $('row c[r*="10"]', sheet).attr('s', '49');
							// //Search all cells for a specific text
							// $('row* c[r]', sheet).each(function() {
							// 	if ($('is t', this).text().match(/(?:^|\b)(cover)(?=\b|$)/gmi)) {
							// 		$(this).attr('s', '20');
							// 	}
							// });
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

	
	// function generate_report()
	// {
	// 	var location = "";
	// 	if($('#daterange').val() == "")
	// 	{
	// 		toastr.warning("Please select Date Range.");
	// 		return;
	// 	}

	// 	if($('#cboUser').val() == "")
	// 	{
	// 		toastr.warning("Please select a User.");
	// 		return;
	// 	}

	// 	if($('#cboMaterial').val() == "")
	// 	{
	// 		toastr.warning("Please select a Material Type.");
	// 		return;
	// 	}

	// 	if($('#cboReport').val() == 2)
	// 	{
	// 		if($('#cboLocation').val() == "")
	// 		{
	// 			toastr.warning("Please select a Location.");
	// 			return;
	// 		}
	// 	}

	// 	$.ajax(
	// 	{
	// 		url:"<?php echo base_url("Reports_controller/generate_report")?>", 
	// 		type: "POST",
	// 		data:{
	// 				generatedate:$("input[name='generatedate']:checked").val(),
	// 				from:from,
	// 				to:to, 
	// 				user:$('#cboUser').val(),
	// 				report:$('#cboReport').val(),

	// 				material:$('#cboMaterial').val(),

	// 				sortby:$('#cboSortBy').val(),
	// 				sortorder:$('#cboSortOrder').val(),
					
	// 				location:$('#cboLocation').val(),
	// 				reportby:$('#cboReportBy').val(),
	// 				summary:$('#cboSummary').val()
	// 			}, 
	// 		dataType: "JSON",
	// 		success:function(data)  
	// 		{
	// 		  // if(data.status)
	// 		  //   window.open('<?php echo base_url() ?>holdings/reports2/acquisitions', '_blank');
	// 		}  
	// 	});
	// }

	// function generate_report()
	// {
	// 	$.ajax({
	// 		url: '<?php echo site_url("reports_controller/generate_sheetjs") ?>',
	// 		type: "POST",
	// 		dataType: "json",
	// 		data: $('#form').serialize(),
	// 		success: function(data) {

	// 			var createXLSLFormatObj = [];
	// 			var xlsHeader = data.column;
	// 			var xlsRows = data.data;

	// 			// createXLSLFormatObj.push("Bla bla");
	// 			createXLSLFormatObj.push(xlsHeader);
	// 			$.each(xlsRows, function(index, value) {
	// 	            var innerRowData = [];
	// 	            $.each(value, function(ind, val) {
		 
	// 	                innerRowData.push(val);
	// 	            });
	// 	            createXLSLFormatObj.push(innerRowData);
	// 	        });

				
	// 			/* File Name */
	// 			var filename = "FreakyJSON_To_XLS.xlsx";

	// 			/* Sheet Name */
	// 			var ws_name = "FreakySheet";

	// 			if (typeof console !== 'undefined') console.log(new Date());
	// 			var wb = XLSX.utils.book_new(),
	// 			    ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

	// 			/* Add worksheet to workbook */
	// 			XLSX.utils.book_append_sheet(wb, ws, ws_name);

	// 			/* Write workbook and Download */
	// 			if (typeof console !== 'undefined') console.log(new Date());
	// 			XLSX.writeFile(wb, filename);
	// 			if (typeof console !== 'undefined') console.log(new Date());
	// 		}     
	// 	});
        
	// }

	function clear_data(type)
	{
		if(type == 1)
		{
			$('#daterange').val("")
			// $('#cboReport').val(1).change();
			$('#chkUser').prop('checked', false);
			$('#chkMaterial').prop('checked', false);
			$('#cboUser').select2('destroy').find('option').prop('selected', false).end().select2();
			$('#cboMaterial').select2('destroy').find('option').prop('selected', false).end().select2();
			clear_data(2);
			clear_data(3);
			
		}
		else if(type == 2)
		{
			$('#chkLocation').prop('checked', false);
			$('#cboSortBy').val("callnumber").change();
			$('#cboSortOrder').val("ASC").change();
		}
		else
		{
			$('#cboLocation').select2('destroy').find('option').prop('selected', false).end().select2();
			$('#cboReportBy').val(1).change();
			$('#cboSummary').val(1).change();
		}

	}

	$(".chkbox").change(function() 
	{
		if(this.id == "chkMaterial")
		{
			this.checked ? $('#cboMaterial').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboMaterial').select2('destroy').find('option').prop('selected', false).end().select2();
		}

		if(this.id == "chkUser")
		{
			this.checked ? $('#cboUser').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboUser').select2('destroy').find('option').prop('selected', false).end().select2();
		}

		if(this.id == "chkLocation")
		{
			this.checked ? $('#cboLocation').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboLocation').select2('destroy').find('option').prop('selected', false).end().select2();
		}
		
	});

	jQuery.expr[':'].regex = function(elem, index, match) {
	    var matchParams = match[3].split(','),
	        validLabels = /^(data|css):/,
	        attr = {
	            method: matchParams[0].match(validLabels) ? 
	                        matchParams[0].split(':')[0] : 'attr',
	            property: matchParams.shift().replace(validLabels,'')
	        },
	        regexFlags = 'ig',
	        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
	    return regex.test(jQuery(elem)[attr.method](attr.property));
	}


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