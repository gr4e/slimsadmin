
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Monitoring of Serial Materials
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-book"></i> Acquisitions Module</a></li>
			<li class="active"><i class="fa fa-plus"></i> Monitoring of Serial Materials</a></li>
		</ol>
	</section>
	<br>
	<!-- Main content -->
	<div class="box box-default entry">
		<div class="box-header with-border">
			<h3 class="box-title">Acquired Serial Materials</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->

			</div>
		</div>
		<!-- /.box-header -->
		<form id="form">
			<!-- <?php echo validation_errors(); ?> -->
			<div class="box-body">
				<div class="row">
		
					<div class="form-group col-md-4">
						<label>Search for:</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-eye"></i>
							</div>
							<select class="form-control select2" id="cboSearch" name="cboSearch" onchange="onSearchChange()" style="width: 100%;">
								<option value="1">Title (245a)</option>
								<option value="2">Series Statement (490)</option>
							</select>
						</div>
					</div>

					<div class="form-group col-md-8 ut">
						<label>Uniform Title</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-list"></i>
							</div>
							<select class="form-control select2" id="cboTitle" name="cboTitle" onchange="onTitleChange()" style="width: 100%;">
								<?php foreach($titles as $title): ?>
									<option value="<?php echo $title['Frequency']; ?>"><?php echo $title['Title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group col-md-8 st" style="display: none">
						<label>Series Title</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-list"></i>
							</div>
							<select class="form-control select2" id="cboSTitle" name="cboSTitle" onchange="onSTitleChange()" style="width: 100%;">
								<?php foreach($stitles as $stitle): ?>
									<option value="<?php echo $stitle['Frequency']; ?>"><?php echo $stitle['Title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label>From Year</label>  
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control year" id="dpFromYear" name="dpFromYear" onchange="onYearChange(1)">
							</div>
						</div>

						<div class="form-group">
							<label>To Year</label>  
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control year" id="dpToYear" name="dpToYear" onchange="onYearChange(2)">
							</div>
						</div>

						<div class="box-body" id="acquimode">
							<table id="tblAcquiMode" class="display" style="width:60%">
								<thead>
									<tr>
										<th style="text-align: center;">FreqDate2</th>
										<th style="text-align: center;">Acquisition ID</th>
										<th style="text-align: center;">Date</th>
										<th style="text-align: center;">Mode of Acquisition</th>
										<th style="text-align: center;">Issue Number</th>
										<th style="text-align: center;">Frequency</th>
									</tr> 
								</thead>
							</table>
						</div>

						<br>
						<br>
						<div class="form-group pull-right">
							<input type="hidden" name="txtAcquisitionID" id="txtAcquisitionID" /> 
							<input type="hidden" name="txtHoldingsID" id="txtHoldingsID" /> 
							<input type="hidden" name="txtCopyNum" id="txtCopyNum" />
						</div>					
					</div>
				</div>
				<!-- /.row -->
			</div>
		</form>
		<!-- /.box-body -->
		<div class="box-footer">
		</div>
	</div>
	<!-- /.content -->

	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">Records</h3>

			<div class="box-tools pull-right">
				<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body" id="daily" style="display: none">
							<table id="tblDaily" class="display" >
								<thead>
									<tr>
										<th style="padding:0 15px 0 15px;">Year</th>
										<th style="padding:0 15px 0 15px;">Volume</th>
										<th style="padding:0 15px 0 15px;">Month</th>
										<th style="padding:0 15px 0 15px;">1</th>
										<th style="padding:0 15px 0 15px;">2</th>
										<th style="padding:0 15px 0 15px;">3</th>
										<th style="padding:0 15px 0 15px;">4</th>
										<th style="padding:0 15px 0 15px;">5</th>
										<th style="padding:0 15px 0 15px;">6</th>
										<th style="padding:0 15px 0 15px;">7</th>
										<th style="padding:0 15px 0 15px;">8</th>
										<th style="padding:0 15px 0 15px;">9</th>
										<th style="padding:0 15px 0 15px;">10</th>
										<th style="padding:0 15px 0 15px;">11</th>
										<th style="padding:0 15px 0 15px;">12</th>
										<th style="padding:0 15px 0 15px;">13</th>
										<th style="padding:0 15px 0 15px;">14</th>
										<th style="padding:0 15px 0 15px;">15</th>
										<th style="padding:0 15px 0 15px;">16</th>
										<th style="padding:0 15px 0 15px;">17</th>
										<th style="padding:0 15px 0 15px;">18</th>
										<th style="padding:0 15px 0 15px;">19</th>
										<th style="padding:0 15px 0 15px;">20</th>
										<th style="padding:0 15px 0 15px;">21</th>
										<th style="padding:0 15px 0 15px;">22</th>
										<th style="padding:0 15px 0 15px;">23</th>
										<th style="padding:0 15px 0 15px;">24</th>
										<th style="padding:0 15px 0 15px;">25</th>
										<th style="padding:0 15px 0 15px;">26</th>
										<th style="padding:0 15px 0 15px;">27</th>
										<th style="padding:0 15px 0 15px;">28</th>
										<th style="padding:0 15px 0 15px;">29</th>
										<th style="padding:0 15px 0 15px;">30</th>
										<th style="padding:0 15px 0 15px;">31</th>
									</tr> 

								</thead>
							</table>
						</div>

						<div class="box-body" id="weekly" style="display: none" >
							<table id="tblWeekly" class="display" >
								<thead>
									<tr>
										<th rowspan="2" style="padding:0 15px 0 15px;">Year</th>
										<th rowspan="2" style="padding:0 15px 0 15px;">Volume</th>
										<th colspan="2" style="padding:0 15px 0 15px;">January</th>
										<th colspan="2" style="padding:0 15px 0 15px;">February</th>
										<th colspan="2" style="padding:0 15px 0 15px;">March</th>
										<th colspan="2" style="padding:0 15px 0 15px;">April</th>
										<th colspan="2" style="padding:0 15px 0 15px;">May</th>
										<th colspan="2" style="padding:0 15px 0 15px;">June</th>
										<th colspan="2" style="padding:0 15px 0 15px;">July</th>
										<th colspan="2" style="padding:0 15px 0 15px;">August</th>
										<th colspan="2" style="padding:0 15px 0 15px;">September</th>
										<th colspan="2" style="padding:0 15px 0 15px;">October</th>
										<th colspan="2" style="padding:0 15px 0 15px;">November</th>
										<th colspan="2" style="padding:0 15px 0 15px;">December</th>
									</tr> 

									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
							</table>
						</div>

						<div class="box-body" id="monthly" style="display: none">
							<table id="tblMonthly" class="display" >
								<thead>
									<tr>
										<th style="padding:0 15px 0 15px;">Year</th>
										<th style="padding:0 15px 0 15px;">Volume</th>
										<th style="padding:0 15px 0 15px;">January</th>
										<th style="padding:0 15px 0 15px;">February</th>
										<th style="padding:0 15px 0 15px;">March</th>
										<th style="padding:0 15px 0 15px;">April</th>
										<th style="padding:0 15px 0 15px;">May</th>
										<th style="padding:0 15px 0 15px;">June</th>
										<th style="padding:0 15px 0 15px;">July</th>
										<th style="padding:0 15px 0 15px;">August</th>
										<th style="padding:0 15px 0 15px;">September</th>
										<th style="padding:0 15px 0 15px;">October</th>
										<th style="padding:0 15px 0 15px;">November</th>
										<th style="padding:0 15px 0 15px;">December</th>
									</tr> 
								</thead>
							</table>
						</div>

						<div class="box-body" id="quarterly" style="display: none">
							<table id="tblQuarterly" class="display" >
								<thead>
									<tr>
										<th style="padding:0 15px 0 15px;">Year</th>
										<th style="padding:0 15px 0 15px;">Volume</th>
										<th style="padding:0 15px 0 15px;">1st Quarter</th>
										<th style="padding:0 15px 0 15px;">2nd Quarter</th>
										<th style="padding:0 15px 0 15px;">3rd Quarter</th>
										<th style="padding:0 15px 0 15px;">4th Quarter</th>
									</tr> 
								</thead>
							</table>
						</div>

						<div class="box-body" id="Semiannually" style="display: none">
							<table id="tblSemiannually" class="display" >
								<thead>
									<tr>
										<th style="padding:0 15px 0 15px;">Year</th>
										<th style="padding:0 15px 0 15px;">Volume</th>
										<th style="padding:0 15px 0 15px;">1st Half</th>
										<th style="padding:0 15px 0 15px;">2nd Half</th>
									</tr> 
								</thead>
							</table>
						</div>

						<div class="box-body" id="yearly" style="display: none">
							<table id="tblYearly" class="display" >
								<thead>
									<tr>
										<th style="padding:0 15px 0 15px;">Year</th>
										<th style="padding:0 15px 0 15px;">Volume</th>
										<th style="padding:0 15px 0 15px;">Yearly</th>
									</tr> 
								</thead>
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

	var title = "---";
	var stitle = "---";
	var fromyear = "---";
	var toyear = "---";
	var search = $('#cboSearch').val();
	
	function onSearchChange()
	{
		if($('#cboSearch').val() == 1)
		{
			$('.ut').show(1000);
			$('.st').hide(1000);
		}
		else if($('#cboSearch').val() == 2)
		{
			$('.ut').hide(1000);
			$('.st').show(1000);
		}

		$('#tblAcquiMode').dataTable().fnClearTable();

		$('#tblDaily').dataTable().fnClearTable();
		$('#tblWeekly').dataTable().fnClearTable();
		$('#tblMonthly').dataTable().fnClearTable();
		$('#tblQuarterly').dataTable().fnClearTable();
		$('#tblSemiannually').dataTable().fnClearTable();
		$('#tblYearly').dataTable().fnClearTable();

		$('#daily').hide('1000');
		$('#weekly').hide('1000');
		$('#monthly').hide('1000');
		$('#quarterly').hide('1000');
		$('#Semiannually').hide('1000');
		$('#yearly').hide('1000');

	}

	function onTitleChange()
	{
		$('#cboTitle').val() == "Daily" ? $('#tblDaily').dataTable().fnClearTable() : $('#daily').hide('1000');

		$('#cboTitle').val() == "Weekly" ? $('#tblWeekly').dataTable().fnClearTable() : $('#weekly').hide('1000');

		$('#cboTitle').val() == "Monthly" ? $('#tblMonthly').dataTable().fnClearTable() : $('#monthly').hide('1000');

		$('#cboTitle').val() == "Quarterly" ? $('#tblQuarterly').dataTable().fnClearTable() : $('#quarterly').hide('1000');

		$('#cboTitle').val() == "Semi-annually" || $('#cboTitle').val() == "Semiannually" ? $('#tblSemiannually').dataTable().fnClearTable() : $('#Semiannually').hide('1000');

		$('#cboTitle').val() == "Yearly" ? $('#tblYearly').dataTable().fnClearTable() : $('#yearly').hide('1000');

		generate();
	}

	function onSTitleChange()
	{
		$('#cboSTitle').val() == "Daily" ? $('#tblDaily').dataTable().fnClearTable() : $('#daily').hide('1000');

		$('#cboSTitle').val() == "Weekly" ? $('#tblWeekly').dataTable().fnClearTable() : $('#weekly').hide('1000');

		$('#cboSTitle').val() == "Monthly" ? $('#tblMonthly').dataTable().fnClearTable() : $('#monthly').hide('1000');

		$('#cboSTitle').val() == "Quarterly" ? $('#tblQuarterly').dataTable().fnClearTable() : $('#quarterly').hide('1000');

		$('#cboSTitle').val() == "Semi-annually" || $('#cboSTitle').val() == "Semiannually" ? $('#tblSemiannually').dataTable().fnClearTable() : $('#Semiannually').hide('1000');

		$('#cboSTitle').val() == "Yearly" ? $('#tblYearly').dataTable().fnClearTable() : $('#yearly').hide('1000');

		generate();
	}

	function onYearChange(num)
	{
		if($('#dpFromYear').val() > $('#dpToYear').val() && $('#dpFromYear').val() != "" &&  $('#dpToYear').val() != "")
		{
			toastr.warning("Please choose year accordingly.");
			num == 1 ? $('#dpFromYear').val("") : $('#dpToYear').val("");
			return;
		}
		else
		{
			generate();
		}
		
	}

	function generate()
	{
		title = $('#cboTitle option:selected').text();
		stitle = $('#cboSTitle option:selected').text();
		fromyear = $('#dpFromYear').val();
		toyear = $('#dpToYear').val();
		search = $('#cboSearch').val();

		console.log(title);
		console.log(stitle);
		console.log(fromyear);
		console.log(toyear);

		if(($('#cboTitle').val() == "Daily" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Daily" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblDaily').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_daily") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblDaily').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3,
							data.data[x].col4,
							data.data[x].col5,
							data.data[x].col6,
							data.data[x].col7,
							data.data[x].col8,
							data.data[x].col9,
							data.data[x].col10,
							data.data[x].col11,
							data.data[x].col12,
							data.data[x].col13,
							data.data[x].col14,
							data.data[x].col15,
							data.data[x].col16,
							data.data[x].col17,
							data.data[x].col18,
							data.data[x].col19,
							data.data[x].col20,
							data.data[x].col21,
							data.data[x].col22,
							data.data[x].col23,
							data.data[x].col24,
							data.data[x].col25,
							data.data[x].col26,
							data.data[x].col27,
							data.data[x].col28,
							data.data[x].col29,
							data.data[x].col30,
							data.data[x].col31,
							data.data[x].col32,
							data.data[x].col33,
							data.data[x].col34
							]);
					}
				}     
			});

			$('#daily').show('1000');
		}

		if(($('#cboTitle').val() == "Weekly" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Weekly" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblWeekly').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_weekly") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblWeekly').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3,
							data.data[x].col4,
							data.data[x].col5,
							data.data[x].col6,
							data.data[x].col7,
							data.data[x].col8,
							data.data[x].col9,
							data.data[x].col10,
							data.data[x].col11,
							data.data[x].col12,
							data.data[x].col13,
							data.data[x].col14,
							data.data[x].col15,
							data.data[x].col16,
							data.data[x].col17,
							data.data[x].col18,
							data.data[x].col19,
							data.data[x].col20,
							data.data[x].col21,
							data.data[x].col22,
							data.data[x].col23,
							data.data[x].col24,
							data.data[x].col25,
							data.data[x].col26
							]);
					}
				}     
			});

			$('#weekly').show('1000');
		}

		if(($('#cboTitle').val() == "Monthly" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Monthly" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblMonthly').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_monthly") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblMonthly').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3,
							data.data[x].col4,
							data.data[x].col5,
							data.data[x].col6,
							data.data[x].col7,
							data.data[x].col8,
							data.data[x].col9,
							data.data[x].col10,
							data.data[x].col11,
							data.data[x].col12,
							data.data[x].col13,
							data.data[x].col14
							]);
					}
				}     
			});

			$('#monthly').show('1000');
		}

		if(($('#cboTitle').val() == "Quarterly" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Quarterly" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblQuarterly').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_quarterly") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblQuarterly').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3,
							data.data[x].col4,
							data.data[x].col5,
							data.data[x].col6
							]);
					}
				}     
			});

			$('#quarterly').show('1000');
		}

		if(($('#cboTitle').val() == "Semiannually" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Semiannually" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblSemiannually').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_Semiannually") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblSemiannually').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3,
							data.data[x].col4
							]);
					}
				}     
			});

			$('#Semiannually').show('1000');
		}

		if(($('#cboTitle').val() == "Yearly" && $('#cboSearch').val() == 1) || ($('#cboSTitle').val() == "Yearly" && $('#cboSearch').val() == 2))
		{
			var table = $('#tblYearly').DataTable();

			var rows = table
			.rows()
			.remove()
			.draw();

			$.ajax({
				url: '<?php echo site_url("monitoring_controller/load_yearly") ?>',
				type: "POST",
				dataType: "json",
				data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
				success: function(data) {
					for(var x = 0; x < data.data.length; x++)
					{
						$('#tblYearly').dataTable().fnAddData( 
							[
							data.data[x].col1,
							data.data[x].col2,
							data.data[x].col3
							]);
					}
				}     
			});

			$('#yearly').show('1000');
		}

		var table2 = $('#tblAcquiMode').DataTable();

		var rows = table2
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("monitoring_controller/load_acquimode") ?>',
			type: "POST",
			dataType: "json",
			data: { title: title, stitle: stitle, fromyear: fromyear, toyear: toyear, search: search },
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAcquiMode').dataTable().fnAddData( 
						[
						data.data[x].FreqDate2,
						data.data[x].AcquisitionID,
						data.data[x].FreqDate,
						data.data[x].Source,
						data.data[x].IssueNumber,
						data.data[x].Frequency
						]);
				}
			}     
		});

		table2
	    .column( '0' )
	    .order( 'asc' )
	    .draw();
		table2.buttons().remove();
	}

	$(document).ready(function() 
	{
		var table = $('#tblAcquiMode').DataTable(
		{
			"pageLength": 12,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_acquimode") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			},
			{
				"targets": [0], "visible": false
			},
			{ "width": "20%", "targets": "_all" }
			]
		});

		table.buttons().remove();
		$('.year').inputmask("9999");  
	});

	$(document).ready(function() 
	{
		var table = $('#tblDaily').DataTable(
		{
			"pageLength": 12,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_daily") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	$(document).ready(function()
	{
		var table = $('#tblWeekly').DataTable(
		{ 
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_weekly") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json", 
			},
			"rowsGroup": [0,1],
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	$(document).ready(function() 
	{
		var table = $('#tblMonthly').DataTable(
		{
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_monthly") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	$(document).ready(function() 
	{
		var table = $('#tblQuarterly').DataTable(
		{
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_quarterly") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	$(document).ready(function() 
	{
		var table = $('#tblSemiannually').DataTable(
		{
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_Semiannually") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	$(document).ready(function() 
	{
		var table = $('#tblYearly').DataTable(
		{
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("monitoring_controller/load_yearly") ?>",
				type : 'POST',
				data:{title:title, stitle:stitle, fromyear:fromyear, toyear:toyear, search:search},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
			{
				"targets": "_all", "orderable": false
			}
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				filename: 'Monitoring of Serial Materials',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
				filename: 'Monitoring of Serial Materials',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				messageTop: 'Monitoring of Serial Materials',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});

	function logThis(id)
	{
		$.ajax(
		{  
			url : "<?php echo site_url('monitoring_controller/create_log')?>/"+id,
			type: "POST",
			data: $('#form').serialize(),
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

	$('.year').datepicker({
		minViewMode: 2,
		format: 'yyyy',
		autoclose: true,
		orientation: "bottom auto"
	});

</script>
<!-- END SCRIPT -->

<style type="text/css">

	table.dataTable thead>tr>th.sorting_asc,
	table.dataTable thead>tr>th.sorting_desc,
	table.dataTable thead>tr>th.sorting,
	table.dataTable thead>tr>td.sorting_asc,
	table.dataTable thead>tr>td.sorting_desc,
	table.dataTable thead>tr>td.sorting {
		padding-right: 8px;
	}

	th.sorting_asc::after,
	th.sorting_desc::after {
		content:"" !important;
	}

	table, th, td {
		border: 1px solid gray;
	}

	td {
		text-align: center;
	}

	table tr:nth-child(even) {
		background-color: #eee;
	}
	table tr:nth-child(odd) {
		background-color:#fff;
	}
	table th {
		background-color: #3783ae;
		color: white;
	}

</style>