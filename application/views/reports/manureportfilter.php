
<div class="content-wrapper">

	<div class="box box-default entry">

		<div>
			<div class="box-body">
				<div class="col-md-6">
					<div id="exportContent" class="box box-solid">
						<!-- <div id="progressbar"><div id="progresslabel"></div></div> -->
					
					<!-- <button onclick="export_doc('exportContent', 'word-content');">Export as .doc</button> -->
						<div class="box-header with-border">
							<i class="fa fa-text-width"></i>

							<h3 class="box-title" style="text-align: center;">Reports</h3>
						</div>
						<div class="box-body">
							<!-- <dl id="materials" style="display: none">
								<dt>Books</dt>
								<div id="appendBooks"></div>
								<dt>Serials</dt>
								<div id="appendSerials"></div>
								<dt>Theses/Dissertations</dt>
								<div id="appendTheses"></div>
								<dt>Non-Prints</dt>
								<div id="appendNP"></div>
								<dt>Vertical Files</dt>
								<div id="appendVF"></div>
								<dt>Investigatory Projects</dt>
								<div id="appendIP"></div>
								<dt>Technical Reports</dt>
								<div id="appendTR"></div>
								<dt>Reprints</dt>
								<div id="appendReprints"></div>
							</dl> -->

							<div class="form-group">
								<label>Material Type</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-book"></i>
									</div>
									<select class="form-control select2" id="cboMaterial" name="cboMaterial" multiple style="width: 100%; display: none;">
			              				<?php foreach($materials as $material): ?>
			              					<option value="<?php echo $material['MaterialTypeID']; ?>"><?php echo $material['MaterialType']; ?></option>
			              				<?php endforeach; ?>
			              			</select>
			              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkMaterial"> Select All</div>
								</div>
							</div>

							<div class="form-group">
								<label>Acquisition Mode</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-book"></i>
									</div>
									<select class="form-control select2" id="cboMode" name="cboMode" multiple style="width: 100%; display: none;">
			              				<?php foreach($sources as $source): ?>
			              					<option value="<?php echo $source['SourceID']; ?>"><?php echo $source['Source']; ?></option>
			              				<?php endforeach; ?>
			              			</select>
			              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkMode"> Select All</div>
								</div>
							</div>

							<div class="form-group">
								<label>Acquired By</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<select class="form-control select2" id="cboUser" name="cboUser" multiple style="width: 100%; display: none;">
			              				<?php foreach($users as $user): ?>
			              					<option value="<?php echo $user['UserName']; ?>"><?php echo $user['UserName']; ?></option>
			              				<?php endforeach; ?>
			              			</select>
			              			<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkUser"> Select All</div>
								</div>
							</div>

							<div class="form-group">
								<label>Date Acquired</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input id="daterange" name="daterange" type="text" class="form-control pull-right">
								</div>
							</div>
							<button onclick="load_pdf();">Generate Report</button>
						</div>
					</div>
					
				</div>
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

	$(document).ready(function(){
  		$('#daterange').inputmask("99/99/9999 - 99/99/9999");  
	});

	$(function() {
		$('#daterange').daterangepicker({
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			}
		});

		$('#daterange').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			from = picker.startDate.format('MM/DD/YYYY');
			to = picker.endDate.format('MM/DD/YYYY');
		});

		$('#daterange').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});
	});

	function load_pdf()
	{
		if($('#cboMaterial').val() == null)
		{
			toastr.warning("Please select a Material Type.");
			return;
		}
		if($('#cboMode').val() == null)
		{
			toastr.warning("Please select an Acquisition Mode.");
			return;
		}
		if($('#cboUser').val() == null)
		{
			toastr.warning("Please select a User.");
			return;
		}
		if($('#daterange').val() == "")
		{
			toastr.warning("Please select Date Range.");
			return;
		}

		$.ajax(
		{
			url:"<?php echo base_url("Reports_controller/set_params")?>", 
			type: "POST",
			data:{material:$('#cboMaterial').val(),mode:$('#cboMode').val(),user:$('#cboUser').val(),from:from,to:to}, 
			dataType: "JSON",
			success:function(data)  
			{
			  if(data.status)
			    window.open('<?php echo base_url() ?>holdings/reports2/acquisitions', '_blank');
			}  
		});
	}

	$(".chkbox").change(function() 
	{
		if(this.id == "chkMaterial")
		{
			this.checked ? $('#cboMaterial').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboMaterial').select2('destroy').find('option').prop('selected', false).end().select2()
		}

		if(this.id == "chkMode")
		{
			this.checked ? $('#cboMode').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboMode').select2('destroy').find('option').prop('selected', false).end().select2()
		}

		if(this.id == "chkUser")
		{
			this.checked ? $('#cboUser').select2('destroy').find('option').prop('selected', 'selected').end().select2() : $('#cboUser').select2('destroy').find('option').prop('selected', false).end().select2()
		}	
	});

	

</script>

