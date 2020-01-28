<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/Tooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			New Acquisitions - Accessioning
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-book"></i> Acquisitions Module</a></li>
			<li class="active"><i class="fa fa-plus"></i> New Acquisitions</a></li>
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

		<div class="box-header with-border">
			<button type="button" onclick="AddAcquisition()" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> Add Acquisitions</button>
		</div>

		<div class="box-header with-border" style="padding-left: 23; padding-right: 23;">
			<a class="btn btn-social-icon btn-github matType_b1" onclick="generate('1')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b3" onclick="generate('2')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b2" onclick="generate('3')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b4" onclick="generate('4')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b5" onclick="generate('5')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b6" onclick="generate('6')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b7" onclick="generate('7')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<a class="btn btn-social-icon btn-github matType_b8" onclick="generate('8')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a>
			<!-- <a class="btn btn-social-icon btn-github matType_b9" onclick="generate('9')" style="margin-left: 10; margin-right: 10; width: 67; height: 67"><i style="font-size: 15px"></a> -->
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body">
							<table id="tblAcquisition" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="1">Acquisitions ID</th>
										<th rowspan="1">Title</th>
										<th rowspan="1">Author</th>
										<th rowspan="1">Material Type</th>
										<th rowspan="1">Copyright Date</th>
										<th rowspan="1">Copy Number</th>
										<th rowspan="1">Catalog/Uncatalog</th>
										<th rowspan="1">Created By</th>
										<th rowspan="1">Created Date</th>
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
			<h3 class="box-title">Acquisitions Entry Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-toggle="collapse" id="zzz" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="collapse" id="collapseExample">
			<form id="form" >
				<!-- <?php echo validation_errors(); ?> -->
				<div class="box-body">
					<div class="row">
						<!-- Left Column -->
						<div class="col-md-6">

							<!-- Material Type form-group -->
							<div class="form-group">
								<label>Material Type
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>006</em>
									</div>
									<select class="form-control select2" id="cboMaterialType" name="cboMaterialType" onchange="onMaterialTypeChange()" style="width: 100%; display: none;">
										<?php foreach($types as $type): ?>
											<option value="<?php echo $type['MaterialTypeID']; ?>"><?php echo $type['MaterialType']; ?></option>
										<?php endforeach; ?>
									</select>
									<div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Material Type form-goup -->

							<!-- ISBN form-group -->
							<div class="form-group" id="isbn">
								<label>ISBN
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>020</em>
									</div>
									<input type="text" class="form-control" id="txtISBN" name="txtISBN">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End ISBN form-group -->

							<!-- ISSN form-group -->
							<div class="form-group" id="issn" style="display: none">
								<label>ISSN
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>022</em>
									</div>
									<input type="text" class="form-control" id="txtISSN" name="txtISSN">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End ISSN form-group -->

							<!-- Classification Number form-group -->
							<div class="form-group">
								<label>Call Number
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>050a</em>
									</div>
									<input type="text" class="form-control" id="txtClassificationNum" name="txtClassificationNum" placeholder="Classification Number">
									<!-- <div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkClassificationNum"> Optional Fields</div> -->
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div id="optnlClassNum" >
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em >050b</em>
										</div>
										<input type="text" class="form-control" id="txtAuthorNum" name="txtAuthorNum" placeholder="Author Number" data-toggle="tooltip" title="Author Number">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em >050c</em>
										</div>
										<input type="text" class="form-control" id="txtCopyrightDate" name="txtCopyrightDate" placeholder="Publication Date/Copyright Date" data-toggle="tooltip" title="Publication Date/Copyright Date">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- End Classification Number form-group -->

							<!-- Author form-group -->
							<div class="form-group">
								<label>Author
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>100</em>
									</div>
									<div class="form-control"><input type="checkbox" class="chkbox" id="chk100" name="chktag[]" value="100"> Personal Author</div>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-addon">
										<em>110</em>
									</div>
									<div class="form-control"><input type="checkbox" class="chkbox" id="chk110" name="chktag[]" value="110"> Corporate Author</div>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Author form-group -->

							<div class="form-group">
								<!-- Personal Author -->
								<div id="personal" style="display: none;">
									<div class="input-group">
										<div class="input-group-addon">
											<em>100</em>
										</div>
										<select class="form-control select2" id="cboPersonal" name="cboPersonal" style="width: 100%; ">
											<option selected="selected" value="0">Forename</option>
											<option value="1">Surname</option>
											<option value="3">Family name</option>
										</select>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>100a</em>
										</div>
										<input type="text" class="form-control authorname" id="txtPersonal" name="txtPersonal" placeholder="Personal Name" data-toggle="tooltip" title="Personal Name">
										<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chk100optn" name="chk100optn" value="1"> Optional Fields</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>100b</em>
										</div>
										<input type="text" class="form-control " id="txtB100" name="txtB100" placeholder="Numeration" data-toggle="tooltip" title="Numeration" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>100c</em>
										</div>
										<input type="text" class="form-control " id="txtC100" name="txtC100" placeholder="Titles and words associated with a name" data-toggle="tooltip" title="Titles and words associated with a name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>100e</em>
										</div>
										<input type="text" class="form-control " id="txtE100" name="txtE100" placeholder="Relator term" data-toggle="tooltip" title="Relator term" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>100d</em>
										</div>
										<input type="text" class="form-control " id="txtD100" name="txtD100" placeholder="Dates associated with a name" data-toggle="tooltip" title="Dates associated with a name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>100q</em>
										</div>
										<input type="text" class="form-control " id="txtQ100" name="txtQ100" placeholder="Fuller form of name" data-toggle="tooltip" title="Fuller form of name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn100" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>100u</em>
										</div>
										<input type="text" class="form-control " id="txtU100" name="txtU100" placeholder="Affiliation" data-toggle="tooltip" title="Affiliation" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
								<!-- End Personal Author -->
							</div>

							<div class="form-group">
								<!-- Corporate Author -->
								<div id="corporate" style="display: none;">
									<div class="input-group">
										<div class="input-group-addon">
											<em>110</em>
										</div>
										<select class="form-control select2" id="cboCorporate" name="cboCorporate" style="width: 100%;">
											<option selected="selected" value="0">Inverted name</option>
											<option value="1">Jurisdiction name</option>
											<option value="2">Name in direct order</option>
										</select>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>110a</em>
										</div>
										<input type="text" class="form-control authorname" id="txtCorporate" name="txtCorporate" placeholder="Corporate name or jurisdiction name as entry element" data-toggle="tooltip" title="Corporate name or jurisdiction name as entry element">
										<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chk110optn" name="chk110optn" value="1"> Optional Fields</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn110" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>110b</em>
										</div>
										<input type="text" class="form-control " id="txtB110" name="txtB110" placeholder="Subordinate unit" data-toggle="tooltip" title="Subordinate unit" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn110" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>110c</em>
										</div>
										<input type="text" class="form-control " id="txtC110" name="txtC110" placeholder="Location of meeting" data-toggle="tooltip" title="Location of meeting">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn110" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>110d</em>
										</div>
										<input type="text" class="form-control " id="txtD110" name="txtD110" placeholder="Date of meeting or treaty signing" data-toggle="tooltip" title="Date of meeting or treaty signing" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn110" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>110n</em>
										</div>
										<input type="text" class="form-control " id="txtN110" name="txtN110" placeholder="Number of part/section/meeting" data-toggle="tooltip" title="Number of part/section/meeting" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
								<!-- End Corporate Author -->
							</div>

							<div class="form-group">
								<!-- Added Personal Author -->
								<div id="addedPersonal" style="display: none;">
									<div class="input-group">
										<div class="input-group-addon">
											<em>700</em>
										</div>
										<span class="form-control" style="text-align:left"><input type="checkbox" class="chkbox" id="chkPersonal700" name="chkPersonal700" value="1"> Added Entry (Personal Author)</span>
										<div id="divAddedForname" style="display: none">
											<select class="form-control select2" id="cboPersonal700" name="cboPersonal700" style="width: 100%;" >
												<option selected="selected" value="0">Forename</option>
												<option value="1">Surname</option>
												<option value="3">Family name</option>
											</select>
										</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group addedPersonal" style="display: none">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>700a</em>
										</div>
										<input type="text" class="form-control authorname" id="txtPersonal700" name="txtPersonal700" placeholder="Personal Name" data-toggle="tooltip" title="Personal Name">
										<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chk700optn" name="chk700optn" value="1"> Optional Fields</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>700b</em>
										</div>
										<input type="text" class="form-control " id="txtB700" name="txtB700" placeholder="Numeration" data-toggle="tooltip" title="Numeration" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>700c</em>
										</div>
										<input type="text" class="form-control " id="txtC700" name="txtC700" placeholder="Titles and words associated with a name" data-toggle="tooltip" title="Titles and words associated with a name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>700e</em>
										</div>
										<input type="text" class="form-control " id="txtE700" name="txtE700" placeholder="Relator term" data-toggle="tooltip" title="Relator term" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>700d</em>
										</div>
										<input type="text" class="form-control " id="txtD700" name="txtD700" placeholder="Dates associated with a name" data-toggle="tooltip" title="Dates associated with a name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>700q</em>
										</div>
										<input type="text" class="form-control " id="txtQ700" name="txtQ700" placeholder="Fuller form of name" data-toggle="tooltip" title="Fuller form of name" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn700" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>700u</em>
										</div>
										<input type="text" class="form-control " id="txtU700" name="txtU700" placeholder="Affiliation" data-toggle="tooltip" title="Affiliation" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
								<!-- End Added Personal Author -->
							</div>

							<div class="form-group">
								<!-- Added Corporate Author -->
								<div id="addedCorporate" style="display: none;">
									<div class="input-group">
										<div class="input-group-addon">
											<em>710</em>
										</div>
										<span class="form-control" style="text-align:left"><input type="checkbox" class="chkbox" id="chkCorporate710" name="chkCorporate710" value="1"> Added Entry (Corporate Author)</span>
										<div id="divAddedInverted" style="display: none">
											<select class="form-control select2" id="cboCorporate710" name="cboCorporate710" style="width: 100%;">
												<option selected="selected" value="0">Inverted name</option>
												<option value="1">Jurisdiction name</option>
												<option value="2">Name in direct order</option>
											</select>
										</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group addedCorporate" style="display: none">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>710a</em>
										</div>
										<input type="text" class="form-control authorname" id="txtCorporate710" name="txtCorporate710" placeholder="Corporate name or jurisdiction name as entry element" data-toggle="tooltip" title="Corporate name or jurisdiction name as entry element">
										<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chk710optn" name="chk710optn" value="1"> Optional Fields</div>
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn710" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>710b</em>
										</div>
										<input type="text" class="form-control " id="txtB710" name="txtB710" placeholder="Subordinate unit" data-toggle="tooltip" title="Subordinate unit" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn710" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>710c</em>
										</div>
										<input type="text" class="form-control " id="txtC710" name="txtC710" placeholder="Location of meeting" data-toggle="tooltip" title="Location of meeting">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
									<div class="input-group optn710" style="display: none;">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>710d</em>
										</div>
										<input type="text" class="form-control " id="txtD710" name="txtD710" placeholder="Date of meeting or treaty signing" data-toggle="tooltip" title="Date of meeting or treaty signing" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
								<!-- End Added Corporate Author -->
							</div>

							<!-- Title form-group -->
							<div class="form-group">
								<label>Title
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>245a</em>
									</div>
									<input type="text" class="form-control redph ttl" id="txtTitle" name="txtTitle">
									<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkTitle"> Optional Fields</div>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="optnlTitle" style="display: none">
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>245b</em>
										</div>
										<input type="text" class="form-control ttl" id="txtRmndrTitle" name="txtRmndrTitle" placeholder="Remainder of Title" data-toggle="tooltip" title="Remainder of Title" >
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
								<div class="optnlTitle" style="display: none">
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
											<em>245c</em>
										</div>
										<input type="text" class="form-control" id="txtStmntRspnsblty" name="txtStmntRspnsblty" placeholder="Statement of Responsibility" data-toggle="tooltip" title="Statement of Responsibility">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- End Title form-group -->

							<!-- Edition form-group -->
							<div class="form-group">
								<label>Edition Statement</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>250a</em>
									</div>
									<input type="text" class="form-control" id="txtEdition" name="txtEdition">
									<div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkEdition" name="chkEdition"> Optional Fields</div>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div id="optnlEdition" style="display: none">
									<div class="input-group">
										<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
											<em>250b</em>
										</div>
										<input type="text" class="form-control" id="txtRmndrEdtnStmnt" name="txtRmndrEdtnStmnt" placeholder="Remainder of Edition Statement" data-toggle="tooltip" title="Remainder of Edition Statement">
										<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
											<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- End Edition form-group -->

							<!-- Imprint form-group -->
							<div class="form-group">
								<label>Imprint
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>264</em>
									</div>
									<select class="form-control select2" id="cboImprint" name="cboImprint" style="width: 100%; ">
										<option selected="selected" value="#">Not Applicable/Not provided/Earliest</option>
										<option value="2">Intervening</option>
										<option value="3">Current/Last</option>
									</select>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Imprint form-group -->

							<!-- Type of Imprint form-group -->
							<div class="form-group">
								<label>Type of Imprint
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>264</em>
									</div>
									<select class="form-control select2" id="cboMaterialTypeImprint" name="cboMaterialTypeImprint"style="width: 100%; ">
										<option value="0">Production</option>
										<option selected="selected" value="1">Publication</option>
									</select>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Type of Imprint form-group -->

							<!-- Publication form-group -->
							<div class="form-group">
								<label>Publication
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>264a</em>
									</div>
									<input type="text" class="form-control" id="txtPublicationPlace" name="txtPublicationPlace" placeholder="Publication Place" data-toggle="tooltip" title="Place of production, publication, distribution, manufacture ">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>264b</em>
									</div>
									<input type="text" class="form-control" id="txtPublisher" name="txtPublisher" placeholder="Publisher" data-toggle="tooltip" title="Name of producer, publisher, distributor, manufacturer ">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
										<em>264c</em>
									</div>
									<input type="text" class="form-control ttl" id="txtPublicationDate" name="txtPublicationDate" placeholder="Publication Date" data-toggle="tooltip" title="Date of production, publication, distribution, manufacture, or copyright notice ">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Publication form-group -->

							<!-- Physical Description form-group -->
							<div class="form-group">
								<label>Physical Description</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>300a</em>
									</div>
									<input type="text" class="form-control" id="txtExtent" name="txtExtent" placeholder="Extent" data-toggle="tooltip" title="Extent">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>300b</em>
									</div>
									<input type="text" class="form-control" id="txtOtherPhysical" name="txtOtherPhysical" placeholder="Other Physical Details" data-toggle="tooltip" title="Other Physical Details ">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
										<em>300c</em>
									</div>
									<input type="text" class="form-control" id="txtDimensions" name="txtDimensions" placeholder="Dimensions" data-toggle="tooltip" title="Dimensions">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Physical Description form-group -->
						</div>
						<!-- End Left Column -->

						<!-- Right Column -->
						<div class="col-md-6">

							<!-- Frequency form-group -->
							<div class="form-group serial" style="display: none;">
								<label>Frequency
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>310</em>
									</div>
									<select class="form-control select2" id="cboFrequency" name="cboFrequency" onchange="onFrequencyChange()" style="width: 100%; ">
										<option value="Daily">Daily</option>
										<option value="Weekly">Weekly</option>
										<option value="Monthly">Monthly</option>
										<option value="Quarterly">Quarterly</option>
										<option value="SemiAnnually">SemiAnnually</option>
										<option value="Yearly">Yearly</option>
										<option value="Irregular">Irregular</option>
									</select>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Frequency form-group -->

							<div class="form-group frequency" style="display: none;">
								<label id="lblFrequency">
									Day/Month/Year
								</label>
								<div class="row">
									<div class="col-sm-4 day">
										<select class="form-control select2" id="cboDay" name="cboDay" style="width: 100%; ">
											<?php for($x = 1; $x <= 31; $x++){ ?>
											<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-sm-4 week" style="display: none;">
										<select class="form-control select2" id="cboWeek" name="cboWeek" style="width: 100%; ">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
									</div>
									<div class="col-sm-4 month">
										<select class="form-control select2" id="cboMonth" name="cboMonth" style="width: 100%; ">
											<?php foreach($months as $month): ?>
												<option value="<?php echo $month['MonthID']; ?>"><?php echo $month['Month']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-4 quarter" style="display: none;">
										<select class="form-control select2" id="cboQuarter" name="cboQuarter" style="width: 100%; ">
											<option value="1">1st Quarter</option>
											<option value="2">2nd Quarter</option>
											<option value="3">3rd Quarter</option>
											<option value="4">4th Quarter</option>
										</select>
									</div>
									<div class="col-sm-4 semiannual" style="display: none;">
										<select class="form-control select2" id="cboSemiAnnual" name="cboSemiAnnual" style="width: 100%; ">
											<option value="1">1st Half</option>
											<option value="2">2nd Half</option>
										</select>
									</div>
									<div class="col-sm-4 year">
										<input type="text" class="form-control dpyear" id="txtYear" name="txtYear">
									</div>
								</div>
							</div>

							<!-- Volume form-group -->
							<div class="form-group">
								<label>Volume
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-book"></i>
									</div>
									<input type="text" class="form-control" id="txtVolume" name="txtVolume">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Volume form-group -->

							<!-- Issue Date form-group -->
							<div class="form-group serial" style="display: none;">
								<label>Issue Date
								</label>
								<div class="input-group date" >
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right datepicker" id="txtIssueDate" name="txtIssueDate">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Issue Date form-group -->

							<!-- Issue Number form-group -->
							<div class="form-group">
								<label>Issue Number
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-barcode"></i>
									</div>
									<input type="text" class="form-control" id="txtIssueNum" name="txtIssueNum">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Issue Number form-group -->

							<!-- Series Statement form-group -->
							<div class="form-group">
								<label>Series Statement
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>490</em>
									</div>
									<input type="text" class="form-control redph" id="txtSeriesStmnt" name="txtSeriesStmnt">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Series Statement form-group -->

							<!-- Bibliography, Etc. Note form-group -->
							<div class="form-group">
								<label>Bibliography, Etc. Note
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<em>504</em>
									</div>
									<input type="text" class="form-control" id="txtBibliography" name="txtBibliography">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Bibliography, Etc. Note form-group -->

							<!-- Accession Number form-group -->
							<div class="form-group">
								<label>Accession Number
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>876a</em>
									</div>
									<input type="text" class="form-control redph" id="txtAccessionNum" name="txtAccessionNum">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Accession Number form-group -->

							<!-- Circulation Number form-group -->
							<div class="form-group">
								<label>Circulation Number
								</label>
								<div class="input-group" >
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>876b</em>
									</div>
									<input type="text" class="form-control redph" id="txtCirculationNum" name="txtCirculationNum">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Circulation Number form-group -->

							<!-- Cost/Price form-group -->
							<div class="form-group" id="cost">
								<label>Cost/Price
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
										<em>876c</em>
									</div>
									<input type="text" class="form-control redph" id="txtCost" name="txtCost">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Cost/Price form-group -->

							<!-- Date Acquired form-group -->
							<div class="form-group">
								<label>Date Acquired
								</label>
								<div class="input-group date">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>876d</em>
									</div>
									<input type="text" class="form-control pull-right datepicker redph"  id="txtDateAcquired" name="txtDateAcquired">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Date Acquired form-group -->

							<!-- Acquisition Mode form-group -->
							<div class="form-group">
								<label>Acquisitions Mode
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
										<em>876e</em>
									</div>
									<select class="form-control select2" id="cboAcquiMode" name="cboAcquiMode" onchange="onAcquiModeChange()" style="width: 100%;">
										<?php foreach($sources as $source): ?>
											<option value="<?php echo $source['SourceID']; ?>"><?php echo $source['Source']; ?></option>
										<?php endforeach;; ?>
									</select>
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Acquisition Mode form-group -->

							<!-- Source form-group -->
							<div class="form-group" id="source" style="display: none;">
								<label>Source
								</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" class="form-control" id="txtSource" name="txtSource">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Source form-group -->

							<!-- Use Restrictions form-group -->
							<div class="form-group">
								<label>Use Restrictions
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>876h</em>
									</div>
									<input type="text" class="form-control" id="txtUseRestrictions" name="txtUseRestrictions">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Use Restrictions form-group -->

							<!-- Item Status form-group -->
							<div class="form-group">
								<label>Item Status
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 10;">
										<em>876j</em>
									</div>
									<input type="text" class="form-control" id="txtItemStatus" name="txtItemStatus">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Item Status form-group -->

							<!-- Temporary Location form-group -->
							<div class="form-group">
								<label>Temporary Location
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 10;">
										<em>876l</em>
									</div>
									<input type="text" class="form-control" id="txtTempLocation" name="txtTempLocation">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Temporary Location form-group -->

							<!-- Copy Number form-group -->
							<div class="form-group">
								<label>Copy Number
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 9;">
										<em>876t</em>
									</div>
									<input type="text" class="form-control" id="txtCopyNum" name="txtCopyNum">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Copy Number form-group -->

							<!-- Nonpublic Note form-group -->
							<div class="form-group">
								<label>Nonpublic Note
								</label>
								<div class="input-group">
									<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
										<em>876x</em>
									</div>
									<input type="text" class="form-control" id="txtNonpublic" name="txtNonpublic">
									<div class="input-group-addon recolor" data-html="true" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
										<i class="fa fa-lightbulb-o" style="width: 13px;"></i>
									</div>
								</div>
							</div>
							<!-- End Nonpublic Note form-group -->


							<br>
							<br>
							<div class="form-group pull-right">
								<input type="hidden" name="txtIsNew" id="txtIsNew" />
								<input type="hidden" name="txtAcquisitionID" id="txtAcquisitionID" />
								<input type="hidden" name="txtHoldingsID" id="txtHoldingsID" />
								<!-- <input type="hidden" name="txtCopyNum" id="txtCopyNum" /> -->

								<button type="button" class="btn btn-info" onclick="save_record()" id="btnSubmit" name="btnSubmit"><label id="lblSubmit">Submit
								</label></button>
								<button type="button" class="btn" onclick="clear_fields()" id="btnClear" name="btnClear">Clear</button>
								<button type="button" class="btn btn-warning" onclick="delete_record()" id="btnDelete" name="btnDelete">Delete</button>
							</div>
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
	$('#txtIsNew').val('add');
	var type = "";

	function generate(material)
	{
		type = material;
		var table = $('#tblAcquisition').DataTable();
		$('#cboMaterialType').val(type).change();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("acquisitions_controller/load_table") ?>',
			type: "POST",
			dataType: "json",
			data: { type: type},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAcquisition').dataTable().fnAddData(
						[
						data.data[x].AcquisitionID,
						data.data[x].Title,
						data.data[x].Author,
						data.data[x].MaterialType,
						data.data[x].CopyrightDate,
						data.data[x].CopyNumber,
						data.data[x].Catalog,
						data.data[x].CreatedBy,
						data.data[x].CreatedAt
					// data.data[x].Action
					]);
				}
			}
		});

		table
	    .column( '0' )
	    .order( 'desc' )
	    .draw();
	}

	//Load DataTable
	$(document).ready(function()
	{
		$('#tblAcquisition').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax":
			{
				url : "<?php echo site_url("acquisitions_controller/load_table") ?>",
				type : 'POST',
				data:{type:type},
				dataType:"json"
			},
			"dom": 'Bfrtip',
			// "order": [[ 8, "desc" ]],
			"buttons":
			[
			{
				extend: 'copy',
				exportOptions:
				{
					columns: [':visible :not(:last-child)']
				},
				text:      '',
				titleAttr: 'Copy',
				className:'opt_icon opt_icon1c',
				title: 'Acquisition',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			},
			{
				extend: 'csv',
				exportOptions:
				{
					columns: [':visible :not(:last-child)']
				},
				text:      '',
				titleAttr: 'CSV',
				className:'opt_icon opt_icon2c',
				filename: 'Acquisition',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},
			{
				extend: 'excel',
				exportOptions:
				{
					columns: [':visible :not(:last-child)']
				},
				text:      '',
				titleAttr: 'Excel',
				className:'opt_icon opt_icon3c',
				filename: 'Acquisition',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},
			{
				extend: 'pdf',
				exportOptions:
				{
					columns: [':visible :not(:last-child)']
				},
				text:      '',
				titleAttr: 'PDF',
				className:'opt_icon opt_icon4c',
				filename: 'Acquisition',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},
			{
				extend: 'print',
				exportOptions:
				{
					columns: [':visible :not(:last-child)']
				},
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

		$('#cboFrequency').val("Daily");
	});
	//End Load Datatable

	$('.authorname').on('keyup change', function(e) {
		var author = $(this).val();
		var id = $(this).attr('id');
		if(author != '')
		{
			$.ajax(
			{
				url:"<?php echo site_url('acquisitions_controller/authordetails')?>",
				method:"POST",
				data:{author:author, id:id },
				dataType:"json",
				success:function(data)
				{

					if(id == 'txtPersonal')
					{
						if(typeof data.txtB100 !== "undefined" || typeof data.txtC100 !== "undefined" || typeof data.txtE100 !== "undefined" || typeof data.txtD100 !== "undefined" || typeof data.txtQ100 !== "undefined" || typeof data.txtU100 !== "undefined")
						{
							if(data.txtB100 != "" || data.txtC100 != "" || data.txtE100 != "" || data.txtD100 != "" || data.txtQ100 != "" || data.txtU100 != "")
							{
								document.getElementById('chk100optn').checked === false ? $("#chk100optn").click() : void 0;
							}
						}

						$('#txtB100').val(data.txtB100);
						$('#txtC100').val(data.txtC100);
						$('#txtE100').val(data.txtE100);
						$('#txtD100').val(data.txtD100);
						$('#txtQ100').val(data.txtQ100);
						$('#txtU100').val(data.txtU100);
					}

					if(id == 'txtCorporate')
					{
						if(typeof data.txtB110 !== "undefined" || typeof data.txtC110 !== "undefined" || typeof data.txtD110 !== "undefined" || typeof data.txtN110 !== "undefined")
						{
							if(data.txtB110 != "" || data.txtC110 != "" || data.txtD110 != "" || data.txtN110 != "")
							{
								document.getElementById('chk110optn').checked === false ? $("#chk110optn").click() : void 0;
							}
						}

						$('#txtB110').val(data.txtB110);
						$('#txtC110').val(data.txtC110);
						$('#txtD110').val(data.txtD110);
						$('#txtN110').val(data.txtN110);
					}

					if(id == 'txtPersonal700')
					{

						if(typeof data.txtB700 !== "undefined" || typeof data.txtC700 !== "undefined" || typeof data.txtE700 !== "undefined" || typeof data.txtD700 !== "undefined" || typeof data.txtQ700 !== "undefined" || typeof data.txtU700 !== "undefined")
						{
							if(data.txtB700 != "" || data.txtC700 != "" || data.txtE700 != "" || data.txtD700 != "" || data.txtQ700 != "" || data.txtU700 != "")
							{
								document.getElementById('chk700optn').checked === false ? $("#chk700optn").click() : void 0;
							}
						}

						$('#txtB700').val(data.txtB700);
						$('#txtC700').val(data.txtC700);
						$('#txtE700').val(data.txtE700);
						$('#txtD700').val(data.txtD700);
						$('#txtQ700').val(data.txtQ700);
						$('#txtU700').val(data.txtU700);
					}

					if(id == 'txtCorporate710')
					{
						if(typeof data.txtB710 !== "undefined" || typeof data.txtC710 !== "undefined" || typeof data.txtD710 !== "undefined")
						{
							if(data.txtB710 != "" || data.txtC710 != "" || data.txtD710 != "")
							{
								document.getElementById('chk710optn').checked === false ? $("#chk710optn").click() : void 0;
							}
						}

						$('#txtB710').val(data.txtB710);
						$('#txtC710').val(data.txtC710);
						$('#txtD710').val(data.txtD710);
					}
				}
			});
		}
	});

	$('.ttl').on('keyup change', function(e) {
		var title = $('#txtTitle').val() + $('#txtRmndrTitle').val();
		var author = $('#txtPersonal').val() + $('#txtCorporate').val();
		var pubyear = $('#txtPublicationDate').val();

		console.log(title);
		console.log(author);
		console.log(pubyear);

		if(title != '')
		{
			$.ajax(
			{
				url:"<?php echo site_url('acquisitions_controller/autoload_fields')?>",
				method:"POST",
				data:{title:title, author:author, pubyear:pubyear},
				dataType:"json",
				success:function(data)
				{

					typeof data.cboMaterialType !== "undefined" ? $('#cboMaterialType').val(data.cboMaterialType).change() : null;
					typeof data.txtISBN !== "undefined" ? $('#txtISBN').val(data.txtISBN) : null;
					typeof data.txtISSN !== "undefined" ? $('#txtISSN').val(data.txtISSN) : null;

					typeof data.txtClassificationNum !== "undefined" ? $('#txtClassificationNum').val(data.txtClassificationNum) : null;
					typeof data.txtAuthorNum !== "undefined" ? $('#txtAuthorNum').val(data.txtAuthorNum) : null;
					typeof data.txtCopyrightDate !== "undefined" ? $('#txtCopyrightDate').val(data.txtCopyrightDate) : null;

					// typeof data.txtRmndrTitle !== "undefined" ? $('#txtRmndrTitle').val(data.txtRmndrTitle) : null;
					typeof data.txtStmntRspnsblty !== "undefined" ? $('#txtStmntRspnsblty').val(data.txtStmntRspnsblty) : null;

					typeof data.txtEdition !== "undefined" ? $('#txtEdition').val(data.txtEdition) : null;
					typeof data.txtRmndrEdtnStmnt !== "undefined" ? $('#txtRmndrEdtnStmnt').val(data.txtRmndrEdtnStmnt) : null;

					if(typeof data.cboImprint !== "undefined")
						$('#cboImprint').val(data.cboImprint).change();
					else
						$('#cboImprint').val("#").change();

					if(typeof data.cboImprintType !== "undefined")
						$('#cboMaterialTypeImprint').val(data.cboImprintType).change();
					else
						$('#cboMaterialTypeImprint').val("1").change();

					typeof data.txtPublisher !== "undefined" ? $('#txtPublisher').val(data.txtPublisher) : null;
					typeof data.txtPublicationPlace !== "undefined" ? $('#txtPublicationPlace').val(data.txtPublicationPlace) : null;
					// typeof data.txtPublicationDate !== "undefined" ? $('#txtPublicationDate').val(data.txtPublicationDate) : null;

					typeof data.txtExtent !== "undefined" ? $('#txtExtent').val(data.txtExtent) : null;
					typeof data.txtOtherPhysical !== "undefined" ? $('#txtOtherPhysical').val(data.txtOtherPhysical) : null;
					typeof data.txtDimensions !== "undefined" ? $('#txtDimensions').val(data.txtDimensions) : null;

					typeof data.cboFrequency !== "undefined" ? $('#cboFrequency').val(data.cboFrequency).change() : null;
					typeof data.txtVolume !== "undefined" ? $('#txtVolume').val(data.txtVolume): null;
					typeof data.txtIssueDate !== "undefined" ? $('#txtIssueDate').val(data.txtIssueDate) : null;
					typeof data.txtIssueNum !== "undefined" ? $('#txtIssueNum').val(data.txtIssueNum) : null;

					typeof data.txtSeriesStatement !== "undefined" ? $('#txtSeriesStmnt').val(data.txtSeriesStatement) : null;
					typeof data.txtBibliography !== "undefined" ? $('#txtBibliography').val(data.txtBibliography) : null;
					typeof data.txtAccessionNum !== "undefined" ? $('#txtAccessionNum').val(data.txtAccessionNum) : null;
					typeof data.txtCirculationNum !== "undefined" ? $('#txtCirculationNum').val(data.txtCirculationNum) : null;
					typeof data.txtCost !== "undefined" ? $('#txtCost').val(data.txtCost) : null;
					// typeof data.txtDateAcquired !== "undefined" ? $('#txtDateAcquired').val(data.txtDateAcquired) : null;
					typeof data.cboAcquiMode !== "undefined" ? $('#cboAcquiMode').val(data.cboAcquiMode).change() : null;
					typeof data.txtUseRestrictions !== "undefined" ? $('#txtUseRestrictions').val(data.txtUseRestrictions) : null;
					typeof data.txtItemStatus !== "undefined" ? $('#txtItemStatus').val(data.txtItemStatus) : null;
					typeof data.txtTempLocation !== "undefined" ? $('#txtTempLocation').val(data.txtTempLocation) : null;
					typeof data.txtNonpublic !== "undefined" ? $('#txtNonpublic').val(data.txtNonpublic) : null;

					hideFrequency();
					showFrequency(data.cboFrequency);

					typeof data.cboDay !== "undefined" ? $('#cboDay').val(data.cboDay).change() : null;
					typeof data.cboWeek !== "undefined" ? $('#cboWeek').val(data.cboWeek).change() : null;
					typeof data.cboMonth !== "undefined" ? $('#cboMonth').val(data.cboMonth).change() : null;
					typeof data.cboQuarter !== "undefined" ? $('#cboQuarter').val(data.cboQuarter).change() : null;
					typeof data.cboSemiAnnual !== "undefined" ? $('#cboSemiAnnual').val(data.cboSemiAnnual).change() : null;
					typeof data.txtYear !== "undefined" ? $('#txtYear').val(data.txtYear) : null;

					//$('#txtCopyNum').val(data.copy_num);
					typeof data.txtHoldingsID !== "undefined" ? $('#txtHoldingsID').val(data.txtHoldingsID).change() : null;
					typeof data.txtAcquisitionID !== "undefined" ? $('#txtAcquisitionID').val(data.txtAcquisitionID): null;
				}
			});
		}
	});

	//Load record to edit
	function edit_record(id)
	{
		save_method = 'edit';
		$('#txtIsNew').val('edit');

		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();

		scroll_top();

		$.ajax(
		{
			url:"<?php echo site_url("acquisitions_controller/load_single_record")?>/"+id,
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{

				if(data.author_tag == "100")
				{
					document.getElementById('chk100').checked === false ? $("#chk100").click() : void 0;

					if(data.txtB100 != "" || data.txtC100 != "" || data.txtE100 != "" || data.txtD100 != "" || data.txtQ100 != "" || data.txtU100 != "")
					{
						document.getElementById('chk100optn').checked === false ? $("#chk100optn").click() : void 0;
					}

					if(data.txtPersonal700 != "")
					{
						document.getElementById('chkPersonal700').checked === false ? $("#chkPersonal700").click() : void 0;

						if(data.txtB700 != "" || data.txtC700 != "" || data.txtE700 != "" || data.txtD700 != "" || data.txtQ700 != "" || data.txtU700 != "")
						{
							document.getElementById('chk700optn').checked === false ? $("#chk700optn").click() : void 0;
						}
					}
					else
					{
						hide_author(false, false, true, false);
					}

					hide_author(false, true, false, false);
				}

				if(data.author_tag == "110")
				{
					document.getElementById('chk110').checked === false ? $("#chk110").click() : void 0;

					if(data.txtB110 != "" || data.txtC110 != "" || data.txtD110 != "" || data.txtN110 != "")
					{
						document.getElementById('chk110optn').checked === false ? $("#chk110optn").click() : void 0;
					}

					if(data.txtCorporate710 != "")
					{
						document.getElementById('chkCorporate710').checked === false ? $("#chkCorporate710").click() : void 0;

						if(data.txtB710 != "" || data.txtC710 != "" || data.txtD710 != "")
						{
							document.getElementById('chk710optn').checked === false ? $("#chk710optn").click() : void 0;
						}
					}
					else
					{
						hide_author(false, false, false, true);
					}

					hide_author(true, false, false, false);
				}

				if(data.author_tag == "100, 110")
				{
					document.getElementById('chk100').checked === false ? $("#chk100").click() : void 0;
					document.getElementById('chk110').checked === false ? $("#chk110").click() : void 0;

					if(data.txtB100 != "" || data.txtC100 != "" || data.txtE100 != "" || data.txtD100 != "" || data.txtQ100 != "" || data.txtU100 != "")
					{
						document.getElementById('chk100optn').checked === false ? $("#chk100optn").click() : void 0;
					}

					if(data.txtPersonal700 != "")
					{
						document.getElementById('chkPersonal700').checked === false ? $("#chkPersonal700").click() : void 0;

						if(data.txtB700 != "" || data.txtC700 != "" || data.txtE700 != "" || data.txtD700 != "" || data.txtQ700 != "" || data.txtU700 != "")
						{
							document.getElementById('chk700optn').checked === false ? $("#chk700optn").click() : void 0;
						}
					}

					if(data.txtB110 != "" || data.txtC110 != "" || data.txtD110 != "" || data.txtN110 != "")
					{
						document.getElementById('chk110optn').checked === false ? $("#chk110optn").click() : void 0;
					}

					if(data.txtCorporate710 != "")
					{
						document.getElementById('chkCorporate710').checked === false ? $("#chkCorporate710").click() : void 0;

						if(data.txtB710 != "" || data.txtC710 != "" || data.txtD710 != "")
						{
							document.getElementById('chk710optn').checked === false ? $("#chk710optn").click() : void 0;
						}
					}
				}

				// if(data.txtAuthorNum != "" || data.txtCopyrightDate != "")
				// {
				// 	$('#chkClassificationNum').prop('checked', true);
				// 	$('#optnlClassNum').show('1000');
				// }
				// else
				// {
				// 	$('#chkClassificationNum').prop('checked', false);
				// 	$('#txtAuthorNum').val('');
				// 	$('#txtCopyrightDate').val('');
				// 	$('#optnlClassNum').hide('1000');
				// }

				if(data.txtRmndrTitle != "" || data.txtStmntRspnsblty != "")
				{
					$('#chkTitle').prop('checked', true);
					$('.optnlTitle').show('1000');
				}
				else
				{
					$('#chkTitle').prop('checked', false);
					$('#txtRmndrTitle').val('');
					$('#txtStmntRspnsblty').val('');
					$('.optnlTitle').hide('1000');
				}

				if(data.txtRmndrEdtnStmnt != "")
				{
					$('#chkEdition').prop('checked', true);
					$('#optnlEdition').show('1000');
				}
				else
				{
					$('#chkEdition').prop('checked', false);
					$('#txtRmndrEdtnStmnt').val('');
					$('#optnlEdition').hide('1000');
				}

				// hideFrequency();
				// showFrequency(data.cboFrequency);

				$('#cboMaterialType').val(data.cboMaterialType).change();
				$('#txtISBN').val(data.txtISBN);
				$('#txtISSN').val(data.txtISSN);
				$('#txtClassificationNum').val(data.txtClassificationNum);
				$('#txtAuthorNum').val(data.txtAuthorNum);
				$('#txtCopyrightDate').val(data.txtCopyrightDate);

				$('#cboPersonal').val(data.cboPersonal).change();
				$('#txtPersonal').val(data.txtPersonal);
				$('#txtB100').val(data.txtB100);
				$('#txtC100').val(data.txtC100);
				$('#txtE100').val(data.txtE100);
				$('#txtD100').val(data.txtD100);
				$('#txtQ100').val(data.txtQ100);
				$('#txtU100').val(data.txtU100);

				$('#cboCorporate').val(data.cboCorporate).change();
				$('#txtCorporate').val(data.txtCorporate);
				$('#txtB110').val(data.txtB110);
				$('#txtC110').val(data.txtC110);
				$('#txtD110').val(data.txtD110);
				$('#txtN110').val(data.txtN110);

				$('#cboPersonal700').val(data.cboPersonal700).change();
				$('#txtPersonal700').val(data.txtPersonal700);
				$('#txtB700').val(data.txtB700);
				$('#txtC700').val(data.txtC700);
				$('#txtE700').val(data.txtE700);
				$('#txtD700').val(data.txtD700);
				$('#txtQ700').val(data.txtQ700);
				$('#txtU700').val(data.txtU700);

				$('#cboCorporate710').val(data.cboCorporate710).change();
				$('#txtCorporate710').val(data.txtCorporate710);
				$('#txtB710').val(data.txtB710);
				$('#txtC710').val(data.txtC710);
				$('#txtD710').val(data.txtD710);

				$('#txtTitle').val(data.txtTitle);
				$('#txtRmndrTitle').val(data.txtRmndrTitle);
				$('#txtStmntRspnsblty').val(data.txtStmntRspnsblty);

				$('#txtEdition').val(data.txtEdition);
				$('#txtRmndrEdtnStmnt').val(data.btxtRmndrEdtnStmnt_250);

				$('#cboImprint').val(data.cboImprint).change();
				$('#cboMaterialTypeImprint').val(data.cboImprintType).change();

				$('#txtPublisher').val(data.txtPublisher);
				$('#txtPublicationPlace').val(data.txtPublicationPlace);
				$('#txtPublicationDate').val(data.txtPublicationDate);

				$('#txtExtent').val(data.txtExtent);
				$('#txtOtherPhysical').val(data.txtOtherPhysical);
				$('#txtDimensions').val(data.txtDimensions);

				$('#cboFrequency').val(data.cboFrequency).change();
				$('#txtVolume').val(data.txtVolume);
				$('#txtIssueDate').val(data.txtIssueDate);
				$('#txtIssueNum').val(data.txtIssueNum);

				$('#cboDay').val(data.cboDay).change();
				$('#cboWeek').val(data.cboWeek).change();
				$('#cboMonth').val(data.cboMonth).change();
				$('#cboQuarter').val(data.cboQuarter).change();
				$('#cboSemiAnnual').val(data.cboSemiAnnual).change();
				$('#txtYear').val(data.txtYear);

				$('#txtSeriesStmnt').val(data.txtSeriesStatement);
				$('#txtBibliography').val(data.txtBibliographicNote);
				$('#txtAccessionNum').val(data.txtAccessionNum);
				$('#txtCirculationNum').val(data.txtCirculationNum);
				$('#txtCost').val(data.txtCost);
				$('#txtDateAcquired').val(data.txtDateAcquired);
				$('#cboAcquiMode').val(data.cboAcquiMode).change();
				$('#txtUseRestrictions').val(data.txtUseRestrictions);
				$('#txtItemStatus').val(data.txtItemStatus);
				$('#txtTempLocation').val(data.txtTempLocation);
				$('#txtNonpublic').val(data.txtNonpublic);

				$('#txtCopyNum').val(data.txtCopyNum);
				$('#txtHoldingsID').val(data.txtHoldingsID);
				$('#txtAcquisitionID').val(data.txtAcquisitionID);

				$('#lblSubmit').text("Save");
				//onMaterialTypeChange();
			}
		});
	}
	//End load record to edit

	//Save new or updated record
	function save_record()
	{
		var url;
		url = "<?php echo site_url('acquisitions_controller/create')?>";

		//var formData = new FormData($('#form')[0]);
		$.ajax(
		{
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success:function(data)
			{
				if(data.status == 'success')
				{
					toastr.success("Record saved successfully.");
					$('#txtIsNew').val() == 'edit' ? logThis(2) : null;

					clear_fields();
					scroll_top();
					$('input').parent().parent().removeClass('has-error');
					//$('input').removeAttr('placeholder');
					$('#txtIsNew').val('add');
					save_method = 'add';
				}
				else if(data.status == 'error')
				{
					toastr.error(data.message);
				}
				else
				{
					for (var i = 0; i < data.inputerror.length; i++)
					{
						// $('[id="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class

						$('#chk100').prop('checked') ? $('#txtPersonal').addClass('redph') : void 0;

						$('#chk110').prop('checked') ? $('#txtCorporate').addClass('redph') : void 0;

						$('#chkPersonal700').prop('checked') ? $('#txtPersonal700').addClass('redph') : void 0;

						$('#chkCorporate710').prop('checked') ? $('#txtCorporate710').addClass('redph') : void 0;

						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
					}

					toastr.warning("Please fill out recquired fields.");

					if($('#cboMaterialType').val() != 2)
					{
						if(document.getElementById('chk100').checked === false && document.getElementById('chk110').checked === false)
						{
							toastr.warning("Please select an Author Type.");
						}
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
		id = $('#txtAcquisitionID').val();

		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					url : "<?php echo site_url('acquisitions_controller/delete')?>/"+id,
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
		var blank = 'null';
		if(id != 1)
		{
			$.ajax(
			{
				url : "<?php echo site_url('acquisitions_controller/create_log')?>/"+id+"/"+blank,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success:function(data)
				{

				}
			});
		}
	}

	function AddAcquisition()
	{
		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();
		scroll_top();
		$('#lblSubmit').text("Submit");
		clear_fields();
	}

	function ReloadDatatable()
	{
		type = $('#cboMaterialType').val();

		switch(type)
		{
			case "1":
			generate(1);
			break;
			case "2":
			generate(2);
			break;
			case "3":
			generate(3);
			break;
			case "4":
			generate(4);
			break;
			case "5":
			generate(5);
			break;
			case "6":
			generate(6);
			break;
			case "7":
			generate(7);
			break;
			case "8":
			generate(8);
			break;
			case "9":
			generate(9);
			break;
			default:
			$('#tblAcquisition').DataTable().ajax.reload(null, false);
		}
	}

	//Frequency related stuffs
	function onFrequencyChange()
	{
		hideFrequency();
		showFrequency($("#cboFrequency").val());
	}
	//End Frequency related stuffs

	//Function to show and hide fields related to Acquisition Mode
	function onAcquiModeChange()
	{
		if ($('#cboAcquiMode').val() <= 2)
		{
			$('#cost').show('1000');
			$('#source').hide('1000');
			$('#txtSource').val("");
		}
		else if($('#cboAcquiMode').val() >= 3)
		{
			$('#source').show('1000');
			$('#cost').hide('1000');
			$('#txtCost').val("");
		}
		else
		{
			$('#source').hide('1000');
			$('#txtSource').val("");
			$('#cost').hide('1000');
			$('#txtCost').val("");
		}
	}
	//End Function to show and hide fields related to Acquisition Mode

	//Function to show and hide fields related to Material Type
	function onMaterialTypeChange()
	{
		if($('#cboMaterialType').val() == 1)
		{
			$('#isbn').show('1000');
			$('#issn').hide('1000');
			$('#txtISSN').val('');
			// $('#rbtn').hide('1000');

			$('.serial').hide('1000');
			$('.frequency').hide('1000');
			clear_serialFields();
		}
		else if($('#cboMaterialType').val() == 2)
		{
			$('#issn').show('1000');
			$('#isbn').hide('1000');
			$('#txtISBN').val('');
			// $('#rbtn').show('1000');

			if(save_method == "add")
			{
				$('#cboFrequency').val('Daily').change();
				hideFrequency();


				showFrequency('Daily');
			}
			$('.serial').show('1000');
			$('.frequency').show('1000');
		}
		else
		{
			$('#issn').hide('1000');
			$('#isbn').hide('1000');
			$('#txtISSN').val('');
			$('#txtISBN').val('');
			// $('#rbtn').hide('1000');

			$('.frequency').hide('1000');
			$('.serial').hide('1000');
			clear_serialFields();
		}
	}
	//End Function to show and hide fields related to Material Type

	//Function to show, hide clear fields related to Author & Title
	$(".chkbox").change(function()
	{
		if(this.checked)
		{
			//Show Classification Number optional fields
			if(this.id == "chkClassificationNum")
			{
				$('#optnlClassNum').show('slow');
			}

			//Show Tag 100 required fields and checkbox to Added Entry
			if(this.id == "chk100")
			{
				$('#personal').show('1000');
				$('#addedPersonal').show('1000');
			}
			//Show Tag 110 required fields and checkbox to Added Entry
			if(this.id == "chk110")
			{
				$('#corporate').show('1000');
				$('#addedCorporate').show('1000');
			}
			// if(this.id == "chk111"){
			//   $('#meeting').show('1000');
			// }

			//Show Tag 100 optional fields
			if(this.id == "chk100optn")
			{
				$('.optn100').show('1000');
			}
			//Show Tag 110 optional fields
			if(this.id == "chk110optn")
			{
				$('.optn110').show('1000');
			}
			// if(this.id == "chk111optn"){
			//   $('.optn111').show('1000');
			// }

			//Show Tag 100 Added Entry required fields
			if(this.id == "chkPersonal700")
			{
				$('#divAddedForname').show('1000');
				$('.addedPersonal').show('1000');
			}
			//Show Tag 110 Added Entry required fields
			if(this.id == "chkCorporate710")
			{
				$('#divAddedInverted').show('1000');
				$('.addedCorporate').show('1000');
			}

			//Show Tag 100 Added Entry optional fields
			if(this.id == "chk700optn")
			{
				$('.optn700').show('1000');
			}
			//Show Tag 110 Added Entry optional fields
			if(this.id == "chk710optn")
			{
				$('.optn710').show('1000');
			}

			//Show Title optional fields
			if(this.id == "chkTitle")
			{
				$('.optnlTitle').show('slow');
			}

			//Show Title optional fields
			if(this.id == "chkEdition")
			{
				$('#optnlEdition').show('1000');
			}
		}
		else
		{
			//Hide and Clear Classification Number optional fields
			if(this.id == "chkClassificationNum")
			{
				if(confirm("Unchecking Classification Number Optional Fields will clear all its fields. Continue?"))
				{
					$('#txtAuthorNum').val('');
					$('#txtPublicationDate').val('');
					$('#optnlClassNum').hide('1000');
				}
				else
				{
					$('#chkClassificationNum').prop('checked', true);
				}
			}

			//Hide and Clear Tag 100 Required & Optional fields
			//Hide and Clear Tag 100 Added Entry Required & Optional fields
			if(this.id == "chk100")
			{
				if(confirm("Unchecking Tag 100 will clear all its fields and Added Entry fields. Continue?"))
				{
					hide_author(true, false, false, false);
				}
				else
				{
					$('#chk100').prop('checked', true);
				}

			}

			//Hide and Clear Tag 110 Required & Optional fields
			//Hide and Clear Tag 110 Added Entry Required & Optional fields
			if(this.id == "chk110")
			{
				if(confirm("Unchecking Tag 110 will clear all its fields and Added Entry fields. Continue?"))
				{
					hide_author(false, true, false, false);
				}
				else
				{
					$('#chk110').prop('checked', true);
				}

			}
			// if(this.id == "chk111"){
			//   $('#meeting').hide('1000');
			//   $('.optn111').hide('1000');
			//   $('#chk111optn').prop('checked', false);
			// }

			//Hide and Clear Tag 100 optional fields
			if(this.id == "chk100optn")
			{
				if(confirm("Unchecking Tag 100 Optional Fields will clear all its fields. Continue?"))
				{
					clear_optnlFields(true, false, false, false);
					$('.optn100').hide('1000');
				}
				else
				{
					$('#chk100optn').prop('checked', true);
				}
			}

			//Hide and Clear Tag 100 optional fields
			if(this.id == "chk110optn")
			{
				if(confirm("Unchecking Tag 110 Optional Fields will clear all its fields. Continue?"))
				{
					clear_optnlFields(false, true, false, false);
					$('.optn110').hide('1000');
				}
				else
				{
					$('#chk110optn').prop('checked', true);
				}
			}
			// if(this.id == "chk111optn"){
			//   $('.optn111').hide('1000');
			// }

			//Hide and Clear Tag 100 Added Entry Required & Optional fields
			if(this.id == "chkPersonal700")
			{
				if(confirm("Unchecking Added Entry (Personal Author) will clear all its fields. Continue?"))
				{
					$('#cboPersonal700').val('0').change();
					$('#txtPersonal700').val('');
					clear_optnlFields(false, false, true, false);

					$('#divAddedForname').hide('1000');
					$('.addedPersonal').hide('1000');
					$('#chk700optn').prop('checked', false);
					$('.optn700').hide('1000');
				}
				else
				{
					$('#chkPersonal700').prop('checked', true);
				}
			}

			//Hide and Clear Tag 110 Added Entry Required & Optional fields
			if(this.id == "chkCorporate710")
			{
				if(confirm("Unchecking Added Entry (Corporate Author) will clear all its fields. Continue?"))
				{
					$('#cboCorporate710').val('0').change();
					$('#txtCorporate710').val('');
					clear_optnlFields(false, false, false, true);

					$('#divAddedInverted').hide('1000');
					$('.addedCorporate').hide('1000');
					$('#chk710optn').prop('checked', false);
					$('.optn710').hide('1000');
				}
				else
				{
					$('#chkCorporate710').prop('checked', true);
				}
			}

			//Hide and Clear Tag 100 Added Entry Optional fields
			if(this.id == "chk700optn")
			{
				if(confirm("Unchecking Added Entry (Personal Author) Optional Fields will clear all its fields. Continue?"))
				{
					clear_optnlFields(false, false, true, false);
					$('.optn700').hide('1000');
				}
				else
				{
					$('#chk700optn').prop('checked', true);
				}
			}

			//Hide and Clear Tag 110 Added Entry Optional fields
			if(this.id == "chk710optn")
			{
				if(confirm("Unchecking Added Entry (Corporate Author) Optional Fields will clear all its fields. Continue?"))
				{
					clear_optnlFields(false, false, false, true);
					$('.optn710').hide('1000');
				}
				else
				{
					$('#chk710optn').prop('checked', true);
				}
			}

			//Hide and Clear Title optional fields
			if(this.id == "chkTitle")
			{
				if(confirm("Unchecking Title Optional Fields will clear all its fields. Continue?"))
				{
					$('#txtRmndrTitle').val('');
					$('#txtStmntRspnsblty').val('');
					$('.optnlTitle').hide('1000');
				}
				else
				{
					$('#chkTitle').prop('checked', true);
				}
			}

			//Hide and Clear Edition optional fields
			if(this.id == "chkEdition")
			{
				if(confirm("Unchecking Edition Optional Fields will clear all its fields. Continue?"))
				{
					$('#txtRmndrEdtnStmnt').val('');
					$('#optnlEdition').hide('1000');
				}
				else
				{
					$('#chkEdition').prop('checked', true);
				}
			}
		}
	});
	//End function to show and hide fields related to Author & Title

	//Function for txtPersonal autocomplete
	$(function()
	{
		$("#txtPersonal").autocomplete(
		{
			source: '<?php echo site_url("acquisitions_controller/autocomplete_personal"); ?>'
		});
	});
	//End function for txtPersonal autocomplete

	//Function for txtPersonal700 autocomplete
	$(function()
	{
		$("#txtPersonal700").autocomplete(
		{
			source: '<?php echo site_url("acquisitions_controller/autocomplete_personal700"); ?>'
		});
	});
	//End function for txtPersonal700 autocomplete

	//Function for txtPersonal autocomplete
	$(function()
	{
		$("#txtCorporate").autocomplete(
		{
			source: '<?php echo site_url("acquisitions_controller/autocomplete_corporate"); ?>'
		});
	});
	//End function for txtPersonal autocomplete

	//Function for txtPersonal700 autocomplete
	$(function()
	{
		$("#txtCorporate710").autocomplete(
		{
			source: '<?php echo site_url("acquisitions_controller/autocomplete_corporate710"); ?>'
		});
	});
	//End function for txtPersonal700 autocomplete

	//Function for txtTitle autocomplete
	$(function()
	{
		$("#txtTitle").autocomplete(
		{
			source: '<?php echo site_url("acquisitions_controller/autocomplete_title"); ?>'
		});
	});
	//End function for txtTitle autocomplete

	//Clear fields
	function clear_fields()
	{
		// ReloadDatatable();
		$('#form')[0].reset();
		$('#txtHoldingsID').val('');
		$('#txtAcquisitionID').val('');
		//$('#txtCopyNum').val('');

		$('#personal').hide('1000');
		$('#corporate').hide('1000');
		//$('#meeting').hide('1000');
		$('.optn100').hide('1000');
		$('.optn110').hide('1000');
		//$('.optn111').hide('1000');

		$('#addedPersonal').hide('1000');
		$('#divAddedForname').hide('1000');
		$('.addedPersonal').hide('1000');
		$('.optn700').hide('1000');

		$('#addedCorporate').hide('1000');
		$('#divAddedInverted').hide('1000');
		$('.addedCorporate').hide('1000');
		$('.optn710').hide('1000');

		// $('#chkClassificationNum').prop('checked', false);
		// $('#optnlClassNum').hide('1000');

		$('#chkTitle').prop('checked', false);
		$('.optnlTitle').hide('1000');

		$('#chkEdition').prop('checked', false);
		$('#optnlEdition').hide('1000');

		$('#txtPersonal').removeAttr('placeholder');
		$('#txtCorporate').removeAttr('placeholder');
		$('#txtPersonal700').removeAttr('placeholder');
		$('#txtCorporate710').removeAttr('placeholder');
		$('#txtTitle').removeAttr('placeholder');
		$('#txtSeriesStmnt').removeAttr('placeholder');
		$('#txtAccessionNum').removeAttr('placeholder');
		$('#txtCirculationNum').removeAttr('placeholder');
		$('#txtCost').removeAttr('placeholder');

		$('#txtPersonal').removeClass('redph');
		$('#txtCorporate').removeClass('redph');
		$('#txtPersonal700').removeClass('redph');
		$('#txtCorporate710').removeClass('redph');
		$('#txtPersonal').attr("placeholder", "Personal Name");
		$('#txtCorporate').attr("placeholder", "Corporate name or jurisdiction name as entry element");
		$('#txtPersonal700').attr("placeholder", "Personal Name");
		$('#txtCorporate710').attr("placeholder", "Corporate name or jurisdiction name as entry element");

		hideFrequency();

		// $('input').parent().parent().removeClass('has-error');
		// $('input').removeAttr('placeholder');

		$('#cboPersonal').val('0').change();
		$('#cboCorporate').val('0').change();
		$('#cboPersonal700').val('0').change();
		$('#cboCorporate710').val('0').change();
		$('#cboMaterialType').val('1').change();
		$('#cboAcquiMode').val('1').change();

		// $('#tblAcquisition').DataTable().ajax.reload(null, false);

		scroll_top();
		save_method = 'add';
		$('#txtIsNew').val('add');
		$('#lblSubmit').text("Submit");
		//$('input').parent().parent().removeClass('has-error');
	}
	//End clear fields

	//Function to clear Serial Fields
	function clear_serialFields()
	{
		$('#cboFrequency').val('');
		$('#txtVolume').val('');
		$('#txtIssueDate').val('');
		$('#txtIssueNum').val('');
	}
	//End Function to clear Serial Fields

	//Function to clear Author optional fields
	function clear_optnlFields(tag100optnl, tag110optnl, tag100optnladd, tag110optnladd)
	{
		if(tag100optnl)
		{
			$('#txtB100').val('');
			$('#txtC100').val('');
			$('#txtE100').val('');
			$('#txtD100').val('');
			$('#txtQ100').val('');
			$('#txtU100').val('');
		}

		if(tag110optnl)
		{
			$('#txtB110').val('');
			$('#txtC110').val('');
			$('#txtD110').val('');
			$('#txtN110').val('');
		}

		if(tag100optnladd)
		{
			$('#txtB700').val('');
			$('#txtC700').val('');
			$('#txtE700').val('');
			$('#txtD700').val('');
			$('#txtQ700').val('');
			$('#txtU700').val('');
		}

		if(tag110optnladd)
		{
			$('#txtB710').val('');
			$('#txtC710').val('');
			$('#txtD710').val('');
		}
	}
	//End Function to clear Author optional fields

	//Function to show Author related stuffs
	function hide_author(tag100, tag110, tag700, tag710)
	{
		if(tag100)
		{
			$('#chk100').prop('checked', false);
			$('#cboPersonal').val('0').change();
			$('#txtPersonal').val('');
			$('#cboPersonal700').val('0').change();
			$('#txtPersonal700').val('');
			clear_optnlFields(true, false, true, false);

			$('#personal').hide('1000');
			$('.optn100').hide('1000');
			$('#chk100optn').prop('checked', false);

			$('#addedPersonal').hide('1000');
			$('#chkPersonal700').prop('checked', false);
			$('#divAddedForname').hide('1000');
			$('.addedPersonal').hide('1000');
			$('#chk700optn').prop('checked', false);
			$('.optn700').hide('1000');
		}

		if(tag110)
		{
			$('#chk110').prop('checked', false);
			$('#cboCorporate').val('0').change();
			$('#txtCorporate').val('');
			$('#cboCorporate710').val('0').change();
			$('#txtCorporate710').val('');
			clear_optnlFields(false, true, false, true);

			$('#corporate').hide('1000');
			$('.optn110').hide('1000');
			$('#chk110optn').prop('checked', false);

			$('#addedCorporate').hide('1000');
			$('#chkCorporate710').prop('checked', false);
			$('#divAddedInverted').hide('1000');
			$('.addedCorporate').hide('1000');
			$('#chk710optn').prop('checked', false);
			$('.optn710').hide('1000');
		}

		if(tag700)
		{
			clear_optnlFields(false, false, true, false);
			$('#chkPersonal700').prop('checked', false);
			$('#divAddedForname').hide('1000');
			$('.addedPersonal').hide('1000');
			$('#chk700optn').prop('checked', false);
			$('.optn700').hide('1000');
		}

		if(tag710)
		{
			clear_optnlFields(false, false, false, true);;
			$('#chkCorporate710').prop('checked', false);
			$('#divAddedInverted').hide('1000');
			$('.addedCorporate').hide('1000');
			$('#chk710optn').prop('checked', false);
			$('.optn710').hide('1000');
		}
	}
	//End Function to show Author related stuffs

	//Function to show Frequency related stuffs
	function showFrequency(frequency)
	{
		switch(frequency)
		{
			case 'Daily':
				$('#lblFrequency').text("Day / Month / Year");
				$('.frequency').show('1000');
				$('.day').show('1000');
				$('.month').show('1000');
				$('.year').show('1000');
				break;
			case 'Weekly':
				$('#lblFrequency').text("Week / Month / Year");
				$('.frequency').show('1000');
				$('.week').show('1000');
				$('.month').show('1000');
				$('.year').show('1000');
				break;
			case 'Monthly':
				$('#lblFrequency').text("Month / Year");
				$('.frequency').show('1000');
				$('.month').show('1000');
				$('.year').show('1000');
				break;
			case 'Quarterly':
				$('#lblFrequency').text("Quarter / Year");
				$('.frequency').show('1000');
				$('.quarter').show('1000');
				$('.year').show('1000');
				break;
			case 'SemiAnnually':
				$('#lblFrequency').text("Semi-annual / Year");
				$('.frequency').show('1000');
				$('.semiannual').show('1000');
				$('.year').show('1000');
				break;
			case 'Yearly':
				$('#lblFrequency').text("Year");
				$('.frequency').show('1000');
				$('.year').show('1000');
				break;
			case 'Irregular':
				$('#lblFrequency').text("Month / Year");
				$('.frequency').show('1000');
				$('.month').show('1000');
				$('.year').show('1000');
				$('#cboMonth').val("0").change();
				break;
			default:
				break;
		}
	}
	//End Function to show Frequency related stuffs

	//Function to show Frequency related stuffs
	function hideFrequency()
	{
		$('#cboDay').val('1').change();
		$('#cboWeek').val('1').change();
		$('#cboMonth').val('1').change();
		$('#cboQuarter').val('1').change();
		$('#cboSemiAnnual').val('1').change();
		$('#txtYear').val("");

		$('#lblFrequency').text("");
		$('.frequency').hide('1000');
		$('.day').hide('1000');
		$('.week').hide('1000');
		$('.month').hide('1000');
		$('.quarter').hide('1000');
		$('.semiannual').hide('1000');
		$('.year').hide('1000');
	}
	//End Function to show Frequency related stuffs

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
