<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Accession Record Book
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-book"></i> Acquisitions Module</a></li>
			<li class="active"><i class="fa fa-plus"></i> Accession Record Book</a></li>
		</ol>
	</section>
	<br>

	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">Acquired Materials</h3>

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
							<div style="padding: 5px; padding-left: 0px">
								<b>Show/Hide Column : </b>
								<a class="showColumns">Show/Hide All</a> -
								<a class="showHideColumn sh1" data-columnindex="0">Holdings ID</a> -
								<a class="showHideColumn sh2" data-columnindex="1">Acquisitions ID</a> -
								<a class="showHideColumn sh3" data-columnindex="2">Material Type</a> -
								<a class="showHideColumn sh4" data-columnindex="3">ISBN/ISSN</a> -
								<a class="showHideColumn sh5" data-columnindex="4">Call Number</a> -
								<a class="showHideColumn sh6" data-columnindex="5">Author</a> -
								<a class="showHideColumn sh7" data-columnindex="6">Title</a> -
								<a class="showHideColumn sh8" data-columnindex="7">Accession Number</a> -
								<a class="showHideColumn sh9" data-columnindex="8">Circulation Number</a> -
								<a class="showHideColumn sh10" data-columnindex="9">Edition Statement</a> -
								<a class="showHideColumn sh11" data-columnindex="10">Type of Imprint</a> -
								<a class="showHideColumn sh12" data-columnindex="11">Place of Publication</a> -
								<a class="showHideColumn sh13" data-columnindex="12">Publisher</a> -
								<a class="showHideColumn sh14" data-columnindex="13">Publication Date</a> -
								<a class="showHideColumn sh15" data-columnindex="14">Extent</a> -
								<a class="showHideColumn sh16" data-columnindex="15">Other Physical Details</a> -
								<a class="showHideColumn sh17" data-columnindex="16">Dimensions</a> -
								<a class="showHideColumn sh18" data-columnindex="17">Frequency</a> -
								<a class="showHideColumn sh19" data-columnindex="18">Volume</a> -
								<a class="showHideColumn sh20" data-columnindex="19">Issue Date</a> -
								<a class="showHideColumn sh21" data-columnindex="20">Issue Number</a> -
								<a class="showHideColumn sh22" data-columnindex="21">Series Statement</a> -
								<a class="showHideColumn sh23" data-columnindex="22">Bibliography, Etc. Note</a> -
								<a class="showHideColumn sh24" data-columnindex="23">Acquisitions Mode</a> -
								<a class="showHideColumn sh25" data-columnindex="24">Date Acquired</a> -
								<a class="showHideColumn sh26" data-columnindex="25">Cost/Price</a> -
								<a class="showHideColumn sh27" data-columnindex="26">Donor</a> -
								<a class="showHideColumn sh28" data-columnindex="27">Use Restriction</a> -
								<a class="showHideColumn sh29" data-columnindex="28">Item Status</a> -
								<a class="showHideColumn sh30" data-columnindex="29">Temporary Location</a> -
								<a class="showHideColumn sh31" data-columnindex="30">Nonpublic Note</a> -
								<a class="showHideColumn sh32" data-columnindex="31">Copy Number</a>							</div>
								<table id="tblAcquisition" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<!-- <th></th> -->
											<th class="showAll" rowspan="2">Holdings ID</th>
											<th class="showAll" rowspan="2">Acquisitions ID</th>
											<th class="showAll" rowspan="2">Material Type</th>
											<th class="showAll" rowspan="2">ISBN/ISSN</th>
											<th class="showAll" rowspan="2">Call Number</th>
											<th class="showAll" rowspan="2">Author</th>
											<th class="showAll" rowspan="2">Title</th>
											<th class="showAll" rowspan="2">Accession Number</th>
											<th class="showAll" rowspan="2">Circulation Number</th>
											<th class="showAll" rowspan="2">Edition Statement</th>
											<th class="showAll" rowspan="2">Type of Imprint</th>
											<th class="showAll" colspan="3" style="text-align: center">Publication</th>
											<th class="showAll" colspan="3" style="text-align: center">Physical Description</th>
											<th class="showAll" rowspan="2">Frequency</th>
											<th class="showAll" rowspan="2">Volume</th>
											<th class="showAll" rowspan="2">Issue Date</th>
											<th class="showAll" rowspan="2">Issue Number</th>
											<th class="showAll" rowspan="2">Series Statement</th>
											<th class="showAll" rowspan="2">Bibliography, Etc. Note</th>
											<th class="showAll" rowspan="2">Acquisitions Mode</th>
											<th class="showAll" rowspan="2">Date Acquired</th>
											<th class="showAll" rowspan="2">Cost/Price</th>
											<th class="showAll" rowspan="2">Donor</th>
											<th class="showAll" rowspan="2">Use Restriction</th>
											<th class="showAll" rowspan="2">Item Status</th>
											<th class="showAll" rowspan="2">Temporary Location</th>
											<th class="showAll" rowspan="2">Nonpublic Note</th>
											<th class="showAll" rowspan="2">Copy Number</th>
										</tr> 

										<tr>
											<th class="showAll">Publisher</th>
											<th class="showAll">Publication Place</th>
											<th class="showAll">Publication Date</th>
											<th class="showAll">Extent</th>
											<th class="showAll">Other Physical Details</th>
											<th class="showAll">Dimensions</th>
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

<style>
	.showHideColumn, .showColumns {
		cursor: pointer;
	}
</style>

<!-- SCRIPT -->
<script type="text/javascript">

	//Load DataTable
	$(document).ready(function() 
	{
		var table = $('#tblAcquisition').DataTable(
		{
			"pageLength": 10,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("book_controller/load_table") ?>",
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
				title: 'Accession Record Book',
				messageTop: 'Accession Record Book',
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
				filename: 'Accession Record Book',
				className:'opt_icon opt_icon2c',
				messageTop: 'Accession Record Book',
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
				filename: 'Accession Record Book',
				messageTop: 'Accession Record Book',
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
				filename: 'Accession Record Book',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Accession Record Book',
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
				messageTop: 'Accession Record Book',
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

		$('.showColumns').on('click', function () {
			var isVisible = table.columns(':visible').count();
			if(isVisible < table.columns().count())
			{
				table.columns('.showAll').visible(true);
				$(".showColumns").removeClass("main");
				$(".showHideColumn").removeClass("main");

			}
			else if(isVisible > 1)
			{
				table.columns('.showAll').visible(false);
				$(".showColumns").addClass("main");
				$(".showHideColumn").addClass("main");
			}

			
		});

		$('.showHideColumn').on('click', function () {
			var tableColumn = table.column($(this).attr('data-columnindex'));
			tableColumn.visible(!tableColumn.visible());
		});


		$(".sh1").click(function() {
			$(".sh1").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh2").click(function() {
			$(".sh2").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh3").click(function() {
			$(".sh3").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh4").click(function() {
			$(".sh4").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh5").click(function() {
			$(".sh5").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh6").click(function() {
			$(".sh6").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh7").click(function() {
			$(".sh7").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh8").click(function() {
			$(".sh8").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh9").click(function() {
			$(".sh9").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh10").click(function() {
			$(".sh10").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh11").click(function() {
			$(".sh11").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh12").click(function() {
			$(".sh12").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh13").click(function() {
			$(".sh13").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh14").click(function() {
			$(".sh14").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh15").click(function() {
			$(".sh15").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh16").click(function() {
			$(".sh16").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh17").click(function() {
			$(".sh17").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh18").click(function() {
			$(".sh18").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh19").click(function() {
			$(".sh19").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh20").click(function() {
			$(".sh20").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh21").click(function() {
			$(".sh21").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh22").click(function() {
			$(".sh22").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh23").click(function() {
			$(".sh23").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh24").click(function() {
			$(".sh24").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh25").click(function() {
			$(".sh25").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh26").click(function() {
			$(".sh26").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh27").click(function() {
			$(".sh27").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh28").click(function() {
			$(".sh28").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh29").click(function() {
			$(".sh29").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh30").click(function() {
			$(".sh30").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh31").click(function() {
			$(".sh31").toggleClass("main");
			$(".showColumns").removeClass("main");
		});

		$(".sh32").click(function() {
			$(".sh32").toggleClass("main");
			$(".showColumns").removeClass("main");
		});
	});
	//End Load Datatable

	function logThis(id)
	{
		$.ajax(
		{
			url : "<?php echo site_url('book_controller/create_log')?>/"+id,
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
</script>
<!-- END SCRIPT -->

<style>
	.main {
	    color: #CB4335;
	}
</style>
