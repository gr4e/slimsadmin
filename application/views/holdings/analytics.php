
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Analytics
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-book"></i> Analytics</a></li>
			<li class="active"><i class="fa fa-book"></i> Analytics View</a></li>
		</ol>
	</section>
	<br>

	<div class="box box-default entry">
		<!-- <div class="box-header with-border">
			<h3 class="box-title">Analytics View</h3>
		</div> -->

		<div>
			<!-- <form> -->
				<div class="box-body">
					<!-- <ul>
						<?php foreach($serials as $serial): ?>
							<li><a type="text" class="handhover" onclick="load_data('<?php echo $serial['HoldingsID']; ?>')"><?php echo $serial['Title']; ?></a>
								<ul class="<?php echo $serial['HoldingsID']; ?>" style="display: none">
									<?php foreach($volumes as $volume): ?>
										<?php if($serial['HoldingsID'] == $volume['HoldingsID']) : ?>
											<li><a type="text" class="handhover" onclick="load_data('<?php echo $volume['HoldingsID']; ?>')"><?php echo $volume['Volume']; ?></a>
												<ul>
													<?php foreach($issues as $issue): ?>
														<?php if($volume['HoldingsID'] == $issue['HoldingsID'] && $volume['Volume'] == $issue['Volume']) : ?>
															<li><a type="text" class="handhover" onclick="load_data('<?php echo $issue['HoldingsID']; ?>')"><?php echo $issue['IssueNumber']; ?></a>
															</li>
														<?php endif; ?>
													<?php endforeach; ?>
												</ul>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul> -->

					
					<div class="nav-tabs-custom" >
						<ul class="nav nav-tabs" id="tabs">
							<li class="active"><a href="#tab_1" data-toggle="tab">Analytics List</a></li>
							<li><a href="#tab_2" data-toggle="tab">Analytics Entry</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<ul class="sidebar-menu" data-widget="tree">
									<li class="header chorva">Analytics List</li>

									<div class="box-body">
										<div class="row grid-divider">

											<div class="col-md-4">
												<div class="sidebar-form">
											        <div class="input-group">
											          <input type="text" name="txtSearch" id="txtSearch" class="form-control" placeholder="Search Journal..."data-toggle="tooltip" title="Type &quot;-all&quot; to search all Journals.">
											          <span class="input-group-btn">
											                <button type="buton" name="btnSearch" id="btnSearch" class="btn btn-flat" onclick="search_serial()"><i class="fa fa-search"></i>
											                </button>
											              </span>
											        </div>
											      </div>
												<br>
												<div class="serialform" id="serialform" style="margin-left: 10px;">
													<!-- <?php foreach($serials as $serial): ?>
														<li class="treeview">
															<a href="#" class="texts" style="background: #fff">
																<i class="fa fa-book"></i> <span ><?php echo $serial['Title']; ?></span>
															</a>

															<ul class="treeview-menu <?php echo $serial['HoldingsID']; ?>" style="background: #fff;">
																<div class="volumeform">
																	<?php foreach($volumes as $volume): ?>
																		<?php if($serial['HoldingsID'] == $volume['HoldingsID']) : ?>
																			<li class="treeview">
																				<a href="#" class="texts"><i class="fa fa-circle-o"></i> <span>Volume <?php echo $volume['Volume']; ?> </span>
																						<span class="pull-right-container">
																						<i class="fa fa-angle-left pull-right"></i>
																					</span>
																				</a>

																				<ul class="treeview-menu <?php echo $serial['HoldingsID']; ?>" style="background: #fff">
																					<div class="issueform">
																						<?php foreach($issues as $issue): ?>
																							<?php if($volume['HoldingsID'] == $issue['HoldingsID'] && $volume['Volume'] == $issue['Volume']) : ?>
																								<li class="treeview isactive">
																									<a class="handhover texts" id="<?php echo $issue['IssueNumber']; ?>" onclick="load_table('<?php echo $issue['HoldingsID']; ?>', '<?php echo $issue['Volume']; ?>', '<?php echo $issue['IssueNumber']; ?>')"><i class="fa fa-circle-o"></i><span> Issue Number <?php echo $issue['IssueNumber']; ?></span>
																									</a>

																								</li>
																							<?php endif; ?>
																						<?php endforeach; ?>
																					</div>
																				</ul>

																			</li>
																		<?php endif; ?>
																	<?php endforeach; ?>
																</div>
															</ul>

														</li>
													<?php endforeach; ?> -->
													
												</div>
											</div>
											


											<div class="col-md-8">
												<div id='dt' style="display: none; padding-left: 35">
													<table id="tblAnalytics" class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th rowspan="1">Title</th>
																<th rowspan="1">Author</th>
																<th rowspan="1">Subject</th>
																<th rowspan="1">Attachments</th>
																<th rowspan="1">Qwe</th>
															</tr> 
														</thead>
														<tbody>
														</tbody>
													</table>	
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade bs-example-modal-lg"" id="mdlViewAll">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="mldViewAllTitle">Volumes and Issues</h4>
												</div>
												<div class="modal-body">

													<div class="box-body">
														<section class="content">
															<div class="row">
																<div class="col-xs-12">
																	<div class="box-body">
																		<table id="tblViewAll" class="table table-bordered table-striped cell-border table-hover">
																			<thead>
																				<tr>
																					<th>Volume</th>
																					<th>Issue Number</th>
																					<th>Title</th>
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

													<div class="box">
														<div class="box-body">
															<div class="modal-footer">
																<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</ul>
							</div>

							<div class="tab-pane" id="tab_2">
								<ul class="sidebar-menu" data-widget="tree">
									<li class="header chorva">Analytics Entry</li>
								</ul>
								<!-- <form id="form" class="form-horizontal"> -->
									<div class="box-body">

										<div class="box box-default">
											<div class="box-body">
												<div class="form-group" style="padding-top: 10px">
													<label class="col-sm-2 control-label">Journal Title</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-book"></i>
														</div>
														<select class="form-control select2" id="cboJournal" name="cboJournal" style="width: 100%;">
															<option></option>
															<?php foreach($serials as $serial): ?>
																<option value="<?php echo $serial['HoldingsID']; ?>"><?php echo $serial['Title']; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group one">
													<label class="col-sm-2 control-label">Volume</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-volume-up"></i>
														</div>
														<select class="form-control select2" id="cboVolume" name="cboVolume" style="width: 100%;">
															<option></option>
														</select>
													</div>
												</div>

												<div class="form-group one">
													<label class="col-sm-2 control-label">Issue No.</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-slack"></i>
														</div>
														<select class="form-control select2" id="cboIssueNo" name="cboIssueNo" style="width: 100%;">
															<option></option>
														</select>
													</div>
												</div>

												<div class="form-group two" style="display: none">
													<label class="col-sm-2 control-label">Volume</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-volume-up"></i>
														</div>
														<select class="form-control select2" id="cboVolume2" name="cboVolume2" style="width: 100%;">
															<option></option>
															<?php for($x = 1; $x <= 100; $x++){ ?>
																<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>

												<div class="form-group two" style="display: none">
													<label class="col-sm-2 control-label">Issue No.</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-slack"></i>
														</div>
														<select class="form-control select2" id="cboIssueNo2" name="cboIssueNo2" style="width: 100%;">
															<option></option>
															<?php for($x = 1; $x <= 100; $x++){ ?>
																<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Location</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
														</div>
														<!-- <div class="input-group-addon"> -->
															<select class="form-control select2" id="cboLocation" name="cboLocation" style="width: 100%;">
																<option></option>
																<?php foreach($locations as $location): ?>
																	<option value="<?php echo $location['LocationID']; ?>"><?php echo $location['Location']; ?></option>
																<?php endforeach; ?>
															</select>
														<!-- </div> -->
														<div class="input-group-addon">
															<a type="button" class="handhover" data-toggle="modal" data-target="#mdlLocation"> <i class="fa fa-plus"></i> Add Location</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- <div class="form-group">
											<label class="col-sm-2 control-label">Section</label>
											<div class="input-group col-sm-8">
												<div class="input-group-addon">
													<em>050a</em>
												</div>
												<select class="form-control select2" id="cboSection" name="cboSection" style="width: 100%;">
													<option ></option>
													<option value="Filipiniana">Filipiniana</option>
												</select>
											</div>
										</div> -->

										<div class="box box-default">
											<div class="box-body">
												<!-- <div class="form-group" style="padding-top: 10px">
													<label class="col-sm-2 control-label">Catalog Number</label>
													<div class="input-group col-sm-8"">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>003a</em>
														</div>
														<input type="text" class="form-control" id="txtCatNo" name="txtCatNo" disabled="true">
													</div>
												</div> -->

												<div class="form-group" style="padding-top: 10px">
													<label class="col-sm-2 control-label">Catalog Source</label>
													<div class="input-group col-sm-8"">
														<div class="input-group-addon">
															<em>005</em>
														</div>
														<input type="text" class="form-control" id="txtCatSource" name="txtCatSource">
													</div>
												</div>

												<!-- <div class="form-group">
													<label class="col-sm-2 control-label">Catalog Date</label>
													<div class="input-group col-sm-8"">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>040a</em>
														</div>
														<input type="text" class="form-control" id="txtCatDate" name="txtCatDate">
													</div>
												</div> -->

												<div class="form-group">
													<label class="col-sm-2 control-label">Language</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>041a</em>
														</div>
														<select class="form-control select2" id="cboLanguage" name="cboLanguage" style="width: 100%;">
															<option ></option>
															<?php foreach($languages as $language): ?>
																<option value="<?php echo $language['LanguageID']; ?>"><?php echo $language['LanguageName']; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Broad Class</label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon">
															<em>___</em>
														</div>
														<select class="form-control select2" id="cboBroadClass" name="cboBroadClass" style="width: 100%;">
															<option ></option>
															<?php foreach($broadclasses as $broadclass): ?>
																<option value="<?php echo $broadclass['BroadClassID']; ?>"><?php echo $broadclass['BroadClass']; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group" style="padding-top: 10px">
													<label class="col-sm-2 control-label">Call Number</label>
													<div class="input-group col-sm-8"">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>050a</em>
														</div>
														<input type="text" class="form-control" id="txtClassificationNum" name="txtClassificationNum" placeholder="Classification Number">
													</div>
													
													<label class="col-sm-2 control-label"></label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>050b</em>
														</div>
														<input type="text" class="form-control" id="txtAuthorNum" name="txtAuthorNum" placeholder="Author Number">
													</div>

													<label class="col-sm-2 control-label"></label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>050c</em>
														</div>
														<input type="text" class="form-control" id="txtPublicationDate" name="txtPublicationDate" placeholder="Publication Date/Copyright Date">
													</div>
												</div>
											</div>
										</div>

										<div class="box box-default">
											<div class="box-body">
												<div class="form-group" style="padding-top: 10px">
													<label class="col-sm-2 control-label">Article Title</label>
													<div class="input-group col-sm-8"">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>245a</em>
														</div>
														<input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Title">
													</div>
													
													<label class="col-sm-2 control-label"></label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>245b</em>
														</div>
														<input type="text" class="form-control" id="txtRmndrTitle" name="txtRmndrTitle" placeholder="Remainder of Title">
													</div>

													<label class="col-sm-2 control-label"></label>
													<div class="input-group col-sm-8">
														<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
															<em>245c</em>
														</div>
														<input type="text" class="form-control" id="txtStmntRspnsblty" name="txtStmntRspnsblty" placeholder="Statement of Responsibility">
													</div>
												</div>
											</div>
										</div>

										<div class="box box-default">
											<div class="box-body">
												<div class="col-md-6">
													<div class="form-group" style="padding-top: 10px">
														<label >Physical Description</label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
																<em>300a</em>
															</div>
															<input type="text" class="form-control" id="txtExtent" name="txtExtent" placeholder="Extent">
														</div>

														<label ></label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
																<em>300b</em>
															</div>
															<input type="text" class="form-control" id="txtOtherPhysical" name="txtOtherPhysical" placeholder="Other Physical Details">
														</div>

														<!-- <label ></label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
																<em>050a</em>
															</div>
															<input type="text" class="form-control" id="txtDimensions" name="txtDimensions" placeholder="Dimensions">
														</div> -->
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding-top: 10px">
														<label >Media Type</label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
																<em>337a</em>
															</div>
															<select class="form-control select2 mt" id="cboMTTerm" name="cboMTTerm" style="width: 100%;">
																<option > </option>
																<?php foreach($mediaterms as $mediaterm): ?>
																	<option value="<?php echo $mediaterm['MediaTypeID']; ?>"><?php echo $mediaterm['MediaTypeTerm']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>

														<label ></label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 9; padding-left: 8;">
																<em>337b</em>
															</div>
															<select class="form-control select2 mt" id="cboMTCode" name="cboMTCode" style="width: 100%;" disabled="true">
																<option > </option>
																<?php foreach($mediacodes as $mediacode): ?>
																	<option value="<?php echo $mediacode['MediaTypeID']; ?>"><?php echo $mediacode['MediaTypeCode']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>

														<label ></label>
														<div class="input-group col-sm-10">
															<div class="input-group-addon" style="padding-right: 5; padding-left: 5;">
																<em>337$2</em>
															</div>
															<input type="text" class="form-control" id="txtMTSource" name="txtMTSource" placeholder="Source">
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="pull-right" >
												<input type="hidden" name="txtAnalyticsID" id="txtAnalyticsID" />
												<input type="hidden" name="txtHoldingsID" id="txtHoldingsID" />
												<input type="hidden" name="txtHoldingsCopyID" id="txtHoldingsCopyID" />
												<input type="hidden" name="txtCatalogNumber" id="txtCatalogNumber" />
												<button type="button" class="btn btn-info" onclick="save_record()" id="btnSubmit" name="btnSubmit">Submit</button>
												<button type="button" class="btn" onclick="clear_fields()" id="btnClear" name="btnClear">Clear</button> 
												<button type="button" class="btn btn-warning" onclick="delete_record(txtAnalyticsID.value, 'analytics')" id="btnDelete" name="btnDelete">Delete</button> 
												<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdlAuthor">Launch Default Modal</button> -->
											</div>
										</div>
									</div>

									<div class="modal fade bs-example-modal" id="mdlLocation">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="mdlLocationTitle">Location</h4>
												</div>
												<div class="modal-body">

													<div class="box-body" id="divLocation">
														<section class="content">
															<div class="row">
																<div class="col-xs-6">
																	<div class="form-group">
																		<label>Location
																		</label>
																		<div class="input-group">
																			<div class="input-group-addon">
																				<i class="fa fa-map"></i>
																			</div>
																			<input type="text" class="form-control redph" id="txtLocation" name="txtLocation">
																		</div>
																	</div>

																	<div class="form-group">
																		<label>Material Type
																		</label>
																		<div class="input-group">
																			<div class="input-group-addon">
																				<i class="fa fa-book"></i>
																			</div>
																			<select class="form-control select2" id="cboMaterialType" name="cboMaterialType" style="width: 100%;">
																				<option > </option>
																				<?php foreach($materialtypes as $materialtype): ?>
																					<option value="<?php echo $materialtype['MaterialTypeID']; ?>"><?php echo $materialtype['MaterialType']; ?></option>
																				<?php endforeach; ?>
																			</select>
																		</div>
																	</div>

																	<div>
																		<button type="button" id="btnLocationSubmit" class="btn btn-primary" onclick="save_location()">Submit</button>
																		<button type="button" class="btn btn-default" onclick="clear_location()">Clear</button>
																		<button type="button" class="btn btn-warning" onclick="delete_record(txtLocationID.value, 'location')">Delete</button>
																	</div>
																</div>

																<div class="col-xs-6">
																	<div class="box-body">
																		<table id="tblLocations" class="table table-bordered table-striped table-hover" style="width:100%">
																			<thead >
																				<tr>
																					<th>LocationID</th>
																					<th>Location</th>
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

												</div>
												<div class="modal-footer">
													<input type="hidden" id="txtLocationID" name="txtLocationID">
													<button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade bs-example-modal-lg" id="mdlAuthor">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="mdlAuthorTitle">Author</h4>
												</div>
												<div class="modal-body">

													<div class="box-body">
														<section class="content">
															<div class="row">
																<div class="col-xs-12">
																	<div class="box-body">
																		<table id="tblAuthors" class="table table-bordered table-striped table-hover" style="width: 100%">
																			<thead>
																				<tr>
																					<th>Author ID</th>
																					<th>Author Tag</th>
																					<th>Author Name</th>
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

													<div class="box-body">
														<label class="col-sm-2">Author Type</label>
														<div class="input-group">
															<div class="input-group-addon" >
																<i class="fa fa-fw fa-user"></i>
															</div>
															<select field-type="Select" name="cboAuthor" id="cboAuthor" class="form-control select2" style="width: 100%;">
																<option></option>
																<option value="100">Personal</option>
																<option value="110">Corporate</option>
																<option value="700">Added Personal</option>
																<option value="710">Added Corporate</option>
															</select>
														</div>
													</div>

													<div class="box-body" id="divAuthor">
														<div id="divPersonalAuthor" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Personal Author</h4>
																		<div class="box-body">
																			<label class="col-sm-3">Personal Author Entry Type</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100</i></div>
																				<select field-type="Select" name="cbo100" id="cbo100" class="form-control select2" style="width: 100%;">
																					<option value="0">Forename</option>
																					<option value="1">Surname</option>
																					<option value="3">Family Name</option>
																				</select>
																			</div>
																		</div>  

																		<div class="box-body">
																			<label class="col-sm-3"> Personal Name </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100a</i></div>
																				<input name="txt100a" id="txt100a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Numeration</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100b</i></div>
																				<input name="txt100b" id="txt100b" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Titles and words associated with a name </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100c</i></div>
																				<input name="txt100c" id="txt100c" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Relator Term</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100e</i></div>
																				<input name="txt100e" id="txt100e" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Dates Associated with a Name </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100d</i></div>
																				<input name="txt100d" id="txt100d" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Fuller Form of Name  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100q</i>
																				</div>
																				<input name="txt100q" id="txt100q" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Affiliation   </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>100u</i></div>
																				<input name="txt100u" id="txt100u" type="text" class="form-control" > 
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div id="divCorporateAuthor" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Corporate Author</h4>
																		<div class="box-body">
																			<label class="col-sm-3">Corporate Author Entry Type</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110</i></div>
																				<select field-type="Select" name="cbo110" id="cbo110"  class="form-control select2" style="width: 100%;">
																					<option value="0" > Inverted Name</option>
																					<option value="1" > Jurisdiction Name</option>
																					<option value="2"> Name in direct order</option>
																				</select>
																			</div>
																		</div>  

																		<div class="box-body">
																			<label class="col-sm-3"> Corporate Name or Jurisdiction Name as Entry Element  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110a</i></div>
																				<input name="txt110a" id="txt110a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Subordinate Unit </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110b</i></div>
																				<input name="txt110b" id="txt110b" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Location of Meeting  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110c</i></div>
																				<input name="txt110c"  id="txt110c" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Date of Meeting or Treaty Signing </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110d</i></div>
																				<input name="txt110d" id="txt110d" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Number of Part/Section/Meeting  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>110n</i></div>
																				<input name="txt110n" id="txt110n" type="text" class="form-control" > 
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div id="divAddedPersonal" style="display: none;" >
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Added Personal Author</h4>
																		<div class="box-body">
																			<label class="col-sm-3">Personal Author Entry Type</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700</i></div>
																				<select field-type="Select" name="cbo700" id="cbo700" class="form-control select2" style="width: 100%;">
																					<option value="0"> Forename</option>
																					<option value="1"> Surname</option>
																					<option value="3"> Family Name</option>
																				</select>
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3"> Personal Name  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700a</i></div>
																				<input name="txt700a" id="txt700a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Numeration</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700b</i></div>
																				<input name="txt700b" id="txt700b" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Titles and Words Associated with a Name </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700c</i></div>
																				<input name="txt700c" id="txt700c" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Relator Term</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700e</i></div>
																				<input name="txt700e" id="txt700e" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Dates Associated with a Name </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700d</i></div>
																				<input name="txt700d" id="txt700d" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Fuller Form of Name  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700q</i></div>
																				<input name="txt700q" id="txt700q" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Affiliation </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>700u</i></div>
																				<input name="txt700u" id="txt700u" type="text" class="form-control" >
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div id="divAddedCorporate" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Added Corporate Author</h4>
																		<div class="box-body">
																			<label class="col-sm-3">Corporate Author Entry Type</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>710</i></div>
																				<select field-type="Select" name="cbo710" id="cbo710" class="form-control select2" style="width: 100%;">
																					<option value="0"> Inverted Name</option>
																					<option value="1" > Jurisdiction Name</option>
																					<option value="2"> Name in direct order</option>
																				</select>
																			</div> 
																		</div> 
																		<div class="box-body">
																			<label class="col-sm-3"> Corporate Name or Jurisdiction Name as Entry Element  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>710a</i></div>
																				<input name="txt710a" id="txt710a" type="text" class="form-control redph" >
																			</div>
																		</div>
																		<div class="box-body">
																			<label class="col-sm-3">Subordinate Unit </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>710b</i></div>
																				<input name="txt710b" id="txt710b" type="text" class="form-control" >
																			</div>
																		</div>
																		<div class="box-body">
																			<label class="col-sm-3">Location of Meeting  </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>710c</i></div>
																				<input name="txt710c"  id="txt710c" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Date of Meeting or Treaty Signing </label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>710d</i></div>
																				<input name="txt710d" id="txt710d" type="text" class="form-control" > 
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="txtAuthorID" id="txtAuthorID" /> 
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<button type="button" id="btnAuthorSubmit" class="btn btn-primary" onclick="save_author()">Submit</button>
													<button type="button" class="btn btn-default" onclick="clear_author()">Clear</button>
													<button type="button" class="btn btn-warning" onclick="delete_record(txtAuthorID.value, 'author')">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade bs-example-modal-lg" id="mdlSubject">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="mdlSubjectTitle">Subject</h4>
												</div>
												<div class="modal-body">

													<div class="box-body">
														<section class="content">
															<div class="row">
																<div class="col-xs-12">
																	<div class="box-body">
																		<table id="tblSubjects" class="table table-bordered table-striped table-hover" style="width: 100%">
																			<thead>
																				<tr>
																					<th>Subject ID</th>
																					<th>Subject Type</th>
																					<th>Subject Heading</th>
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

													<div class="box-body">
														<label class="col-sm-2">Subject</label>
														<div class="input-group">
															<div class="input-group-addon" >
																<i class="fa fa-fw fa-user"></i>
															</div>
															<select field-type="Select" name="cboSubject" id="cboSubject" class="form-control select2" style="width: 100%;">
																<option></option>
																<option value="600">Personal Name</option>
																<option value="610">Corporate Name</option>
													            <option value="611">Meeting/Conference</option>
													            <option value="630">Uniform Title</option>
																<option value="650">Topical Term</option>
													            <option value="651">Geographic</option>
															</select>
														</div>
													</div>

													<div class="box-body" id="divSubject">
														<div id="divPersonal" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Personal Name</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Personal Name Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600a</i></div>
																				<input name="txt600a" id="txt600a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Titles and Other Words Associated with a Name</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600c</i></div>
																				<input name="txt600c" id="txt600c" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Subject Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600x</i></div>
																				<input name="txt600x" id="txt600x" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Form Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600v</i></div>
																				<input name="txt600v" id="txt600v" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Chronological Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600y</i></div>
																				<input name="txt600y" id="txt600y" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Geographic Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>600z</i>
																				</div>
																				<input name="txt600z" id="txt600z" type="text" class="form-control" > 
																			</div>
																		</div>

																	</div>
																</div>
															</div>
														</div>

														<div id="divCorporate" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Corporate Name</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Corporate Name Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610a</i></div>
																				<input name="txt610a" id="txt610a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Corporate Name Subordinate Unit</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610b</i></div>
																				<input name="txt610b" id="txt610b" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">General Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610x</i></div>
																				<input name="txt610x"  id="txt610x" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Form Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610v</i></div>
																				<input name="txt610v" id="txt610v" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Chronological Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610y</i></div>
																				<input name="txt610y" id="txt610y" type="text" class="form-control" > 
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Geographic Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>610z</i></div>
																				<input name="txt610z" id="txt610z" type="text" class="form-control" > 
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div id="divMeeting" style="display: none;" >
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Meeting / Conference</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Meeting/Conference Name Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>611a</i></div>
																				<input name="txt611a" id="txt611a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Date</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>611d</i></div>
																				<input name="txt611d" id="txt611d" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Location</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>611c</i></div>
																				<input name="txt611c" id="txt611c" type="text" class="form-control" >
																			</div>
																		</div>

																	</div>
																</div>
															</div>
														</div>

														<div id="divUniform" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Uniform Title</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Uniform Title Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>630a</i></div>
																				<input name="txt630a" id="txt630a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Subject Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>630x</i></div>
																				<input name="txt630x" id="txt630x" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Form Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>630v</i></div>
																				<input name="txt630v" id="txt630v" type="text" class="form-control" >
																			</div>
																		</div>

																	</div>
																</div>
															</div>
														</div>

														<div id="divTopical" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Topical Term</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Topical Term Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>650a</i></div>
																				<input name="txt650a" id="txt650a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Subject Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>650x</i></div>
																				<input name="txt650x" id="txt650x" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Form Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>650v</i></div>
																				<input name="txt650v" id="txt650v" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Subject Chronology</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>650y</i></div>
																				<input name="txt650y" id="txt650y" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Heading Geography</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>650z</i></div>
																				<input name="txt650z" id="txt650z" type="text" class="form-control" >
																			</div>
																		</div>

																	</div>
																</div>
															</div>
														</div>

														<div id="divGeographic" style="display: none;">
															<div class="box">
																<div class="form-group">
																	<div class="box-header with-border">
																		<h4>Topical Term</h4>

																		<div class="box-body">
																			<label class="col-sm-3">Geographic Name Subject Heading</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>651a</i></div>
																				<input name="txt651a" id="txt651a" type="text" class="form-control redph" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Geographic Name Subject Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>651x</i></div>
																				<input name="txt651x" id="txt651x" type="text" class="form-control" >
																			</div>
																		</div>

																		<div class="box-body">
																			<label class="col-sm-3">Form Subdivision</label>
																			<div class="input-group">
																				<div class="input-group-addon" ><i>651v</i></div>
																				<input name="txt651v" id="txt651v" type="text" class="form-control" >
																			</div>
																		</div>

																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="txtSubjectID" id="txtSubjectID" /> 
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<button type="button" id="btnSubjectSubmit" class="btn btn-primary" onclick="save_subject()">Submit</button>
													<button type="button" class="btn btn-default" onclick="clear_subject()">Clear</button>
													<button type="button" class="btn btn-warning" onclick="delete_record(txtSubjectID.value, 'subject')">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade bs-example-modal-lg" id="mdlAttachments">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="mdlAttachmentTitle">Attachments</h4>
												</div>
												<div class="modal-body">

													<div class="box-body">
														<section class="content">
															<div class="row">
																<div class="col-xs-12">
																	<div class="box-body">
																		<table id="tblAttachments" class="table table-bordered table-striped table-hover">
																			<thead>
																				<tr>
																					<th>Multimedia ID</th>
																					<th>File Name</th>
																					<th>File Type</th>
																					<!-- <th>File Location</th> -->
																					<th>Attachment</th>
																					<th>Action</th>
																					<th>Restricted</th>
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

													<div class="box">
														<form method="post" id="form_multimedia" enctype="multipart/form-data">  
															<div class="box-body">
															
																<div class="form-group">
																	<label class="col-sm-3">Upload Attachment</label>
																	<div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-file-image-o"></i>
																		</div>
																		<input type="file" class="form-control" name="attachment" id="attachment">
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-3">Restriction</label>
																	<div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-check-square"></i>
																		</div>
																		<select field-type="Select" name="chkRestriction" id="chkRestriction" class="form-control select2" style="width: 100%;">
																			<option value="1">Restricted</option>
																			<option value="0">Unrestricted</option>
																		</select>
																	</div>
																</div>

																<br>

																<div class="modal-footer">
																	<input type="hidden" name="txtMultimediaID" id="txtMultimediaID" /> 
																	<input type="hidden" name="txtHoldingsID2" id="txtHoldingsID2" />
																	<input type="hidden" name="txtAnalyticsID2" id="txtAnalyticsID2" /> 
																	<input type="hidden" name="txtRestrict"  id="txtRestrict"  />
																	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-info" id="btnAttachmentSubmit" name="btnAttachmentSubmit">Submit</button>
																	<button type="button" class="btn btn-default" onclick="clear_attachments()">Clear</button>
																</div>
															</div>
														</form>
													</div>
												</div>
												<!-- <div class="modal-footer">
													
												</div> -->
											</div>
										</div>
									</div>

								<!-- </form> -->

								<div class="box box-default">
									<div class="box-body">
										<section class="content">
											<div class="row">
												<div class="col-xs-12">
													<div class="box-body">
														<table id="tblAnalytics2" class="table table-bordered table-striped table-hover">
															<thead>
																<tr>
																	<th rowspan="1">Title</th>
																	<th rowspan="1">Author</th>
																	<th rowspan="1">Subject</th>
																	<th rowspan="1">Attachments</th>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- </form> -->
		</div>	
	</div>

		<!-- <div class="box-footer">
		</div> -->
	</div>


<script type="text/javascript">
	var save_method = "add";
	var save_method2 = "add";
	var save_method3 = "add";
	var save_method4 = "add";
	var holdingsid = "", volume = "", issuenum = "";

	$('#txtSearch').keypress(function(e) {
	    if(e.which == 13) {
	        search_serial();
	    }
	});

	$(document).ready(function(){
		var table = $('#tblAnalytics').DataTable(
		{
			"pageLength": 10,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_analytics") ?>",
				type : 'POST',
				data: {holdingsid: holdingsid, volume: volume, issuenum: issuenum},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": [
            {
                "targets": [ -1 ],
                "visible": false
            }
        ]
		});

		table.buttons().remove();

		var table2 = $('#tblAnalytics2').DataTable(
		{
			"pageLength": 10,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_analytics") ?>",
				type : 'POST',
				data: {holdingsid: holdingsid, volume: volume, issuenum: issuenum},
				dataType:"json" 
			},
			"dom": 'Bfrtip'
		});

		table2.buttons().remove();

		var table3 = $('#tblAuthors').DataTable(
		{
			"pageLength": 10,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_authors") ?>",
				type : 'POST',
				data:{id:$('#txtAnalyticsID').val()},
				dataType:"json" 
			},
			"dom": 'Bfrtip'
		});

		table3.buttons().remove();

		var table4 = $('#tblSubjects').DataTable(
		{
			"pageLength": 10,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_subjects") ?>",
				type : 'POST',
				data:{id:$('#txtAnalyticsID').val()},
				dataType:"json" 
			},
			"dom": 'Bfrtip'
		});

		table4.buttons().remove();

		var table5 = $('#tblAttachments').DataTable(
		{
			"pageLength": 10,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_attachments") ?>",
				type : 'POST',
				data:{id:$('#txtAnalyticsID').val()},
				dataType:"json" 
			},
			"dom": 'Bfrtip'
		});

		table5.buttons().remove();

		var table6 = $('#tblViewAll').DataTable(
		{
			"pageLength": 20,
			"scrollX": true,
			"ordering": false,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_viewall") ?>",
				type : 'POST',
				data:{holdingsid:holdingsid},
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": 
			[
				{ "width": "20%", "targets": "_all" }
			],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '',
				titleAttr: 'Copy',
				className:'opt_icon opt_icon1c',
				title: 'Analytics',
				messageTop: 'Analytics',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5, "dt");
				}
			}, 
			{
				extend: 'csv',
				text:      '',
				titleAttr: 'CSV',
				filename: 'Analytics',
				className:'opt_icon opt_icon2c',
				messageTop: 'Analytics',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6, "dt");
				}
			},  
			{
				extend: 'excel',
				text:      '',
				titleAttr: 'Excel',
				className:'opt_icon opt_icon3c',
				filename: 'Analytics',
				messageTop: 'Analytics',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7, "dt");
				}
			},  
			{
				extend: 'pdf',
				text:      '',
				titleAttr: 'PDF',
				className:'opt_icon opt_icon4c',
				filename: 'Analytics',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Analytics',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8, "dt");
				}
			},  
			{
				extend: 'print',
				text:      '',
				className:'opt_icon opt_icon5',
				titleAttr: 'Print',
				messageTop: 'Analytics',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9, "dt");
				}
			}
			]
		});

		var table7 = $('#tblLocations').DataTable(
		{
			"pageLength": 5,
			"ajax": 
			{
				url : "<?php echo site_url("analytics_controller/load_locations") ?>",
				type : 'POST',
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
            ]
		});

		table7.buttons().remove();


		$('#cboJournal').change(function(){

			$('.one').show();
			$('.two').hide();

			var id = $(this).val();

			$.ajax({
				url:'<?php echo site_url('analytics_controller/load_volume_dropdown')?>',
				method: 'post',
				data: {id: id},
				dataType: 'json',
				success: function(response){

					$('#cboVolume').find('option').not(':first').remove();
					$('#cboIssueNo').find('option').not(':first').remove();

					$.each(response,function(index,data){
						$('#cboVolume').append('<option value="'+data['Volume']+'">'+data['Volume']+'</option>');
					});
				}
			});
		});

		$('#cboVolume').change(function(){
			var vol = $(this).val();
			var id = $('#cboJournal').val();

			$.ajax({
				url:'<?php echo site_url('analytics_controller/load_issue_dropdown')?>',
				method: 'post',
				data: {id: id, vol: vol},
				dataType: 'json',
				success: function(response){

					$('#cboIssueNo').find('option').not(':first').remove();

					$.each(response,function(index,data){
						$('#cboIssueNo').append('<option value="'+data['IssueNumber']+'">'+data['IssueNumber']+'</option>');
					});
				}
			});

			// $('#cboVolume2').val($('#cboVolume').val()).change();
		});

		$('#cboIssueNo').change(function(){
			load_table2($('#cboJournal').val(), $('#cboVolume').val(), $('#cboIssueNo').val());
			$('#cboIssueNo2').val($('#cboIssueNo').val()).change();
		});

		$('#cboVolume2').change(function(){
			if(!$('.one').is(':visible'))
			{
				$('.one').show();
				$('.two').hide();
				$('#cboVolume').val($(this).val()).change();
			} 
		});

		$('#cboIssueNo2').change(function(){
			if(!$('.one').is(':visible'))
			{
				$('.one').show();
				$('.two').hide();
				$('#cboVolume').val($('#cboVolume2').val()).change();
			} 
		});

		// $('input').on('input', function(){ 
		// 	if(!$('.one').is(':visible'))
		// 	{
		// 		$('.one').show();
		// 		$('.two').hide();
		// 		$('#cboVolume').val($('#cboVolume2').val()).change();
		// 	}   
		// 	$('#cboIssueNo').val($('#cboIssueNo2').val()).change(); 
		// });

		$('#cboAuthor').change(function() {
			$('#divAuthor').find('input').val("");
			$('#divAuthor').find('select').val("0").change();
			$('#divAuthor').find('input').parent().parent().removeClass('has-error');
			$('#divAuthor').find('input').removeAttr('placeholder');

    		if($('#cboAuthor').val() == 100)
    		{
    			// $('#divSubmit').show();
    			$('#divCorporateAuthor').hide('slow');
    			$('#divAddedPersonal').hide('slow');
    			$('#divAddedCorporate').hide('slow');
    			$('#divPersonalAuthor').show('slow');
    		} 
    		else if ($('#cboAuthor').val() == 110)
    		{   
    			// $('#divSubmit').show();
    			$('#divPersonalAuthor').hide('slow');
    			$('#divAddedPersonal').hide('slow');
    			$('#divAddedCorporate').hide('slow');
    			$('#divCorporateAuthor').show('slow');
    			
    		}
    		else if ($('#cboAuthor').val() == 700)
    		{   
    			// $('#divSubmit').show();
    			$('#divPersonalAuthor').hide('slow');
    			$('#divCorporateAuthor').hide('slow');
    			$('#divAddedCorporate').hide('slow');
    			$('#divAddedPersonal').show('slow');
    			
    		}
    		else if ($('#cboAuthor').val() == 710)
    		{    
    			// $('#divSubmit').show();
    			$('#divPersonalAuthor').hide('slow');
    			$('#divCorporateAuthor').hide('slow');
    			$('#divAddedPersonal').hide('slow');
    			$('#divAddedCorporate').show('slow');
    			
    		}
    		else if($('#cboAuthor').val() == '')
    		{
    			$('#divPersonalAuthor').hide('slow');
    			$('#divCorporateAuthor').hide('slow');
    			$('#divAddedPersonal').hide('slow');
    			$('#divAddedCorporate').hide('slow');
    			// $('#divSubmit').hide();
    		}
    	});

    	$('#cboSubject').change(function() {
    		$('#divSubject').find('input').val("");
    		$('#divSubject').find('input').parent().parent().removeClass('has-error');
			$('#divSubject').find('input').removeAttr('placeholder');

    		if($('#cboSubject').val() == 600)
    		{
    			// $('#divSubmit').show();
    			$('#divCorporate').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').hide('slow');
    			$('#divPersonal').show('slow');
    		} 
    		else if ($('#cboSubject').val() == 610)
    		{   
    			// $('#divSubmit').show();
    			$('#divPersonal').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').hide('slow');
    			$('#divCorporate').show('slow');
    		}
    		else if ($('#cboSubject').val() == 611)
    		{   
    			// $('#divSubmit').show();
    			$('#divPersonal').hide('slow');
    			$('#divCorporate').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').hide('slow');
    			$('#divMeeting').show('slow');
    		}
    		else if ($('#cboSubject').val() == 630)
    		{    
    			// $('#divSubmit').show();
    			$('#divPersonal').hide('slow');
    			$('#divCorporate').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').hide('slow');
    			$('#divUniform').show('slow');
    		}
    		else if ($('#cboSubject').val() == 650)
    		{    
    			// $('#divSubmit').show();
    			$('#divPersonal').hide('slow');
    			$('#divCorporate').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divGeographic').hide('slow');
    			$('#divTopical').show('slow');
    		}
    		else if ($('#cboSubject').val() == 651)
    		{    
    			// $('#divSubmit').show();
    			$('#divPersonal').hide('slow');
    			$('#divCorporate').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').show('slow');
    			
    		}
    		else if($('#cboSubject').val() == '')
    		{
    			$('#divPersonal').hide('slow');
    			$('#divCorporate').hide('slow');
    			$('#divMeeting').hide('slow');
    			$('#divUniform').hide('slow');
    			$('#divTopical').hide('slow');
    			$('#divGeographic').hide('slow');
    			// $('#divSubmit').hide();
    		}
    	});

    	$('#mdlAuthor').on('shown.bs.modal', function() {
			table3.columns.adjust();
		})

    	$('#mdlSubject').on('shown.bs.modal', function() {
			table4.columns.adjust();
		})

    	$('#mdlAttachments').on('shown.bs.modal', function() {
			table5.columns.adjust();
			$('#txtAnalyticsID2').val($('#txtAnalyticsID').val());
		})

		$('#mdlViewAll').on('shown.bs.modal', function() {
			table6.columns.adjust();
		})

    	$("#cboMTTerm").select2({
		    placeholder: "Term",
		    allowClear: true
		});

		$("#cboMTCode").select2({
		    placeholder: "Code",
		    allowClear: true
		});
	});

 	// $('.nav-tabs a').click(function (e) {
	// 	e.preventDefault();
	// 	var tab_index = $($(this).attr('href')).index();

	// 	if(tab_index == 0)
	// 	window.location.href = "<?php echo site_url('analytics_controller/index');?>";

	// });

	$("#cboMTTerm").change(function() {
		// var mtt = $('#cboMTTerm').val();
		$('#cboMTCode').val($(this).val()).change();
	});

	// $("#cboMTCode").change(function() {
	// 	var mtc = $('#cboMTCode').val();
	// 	$('#cboMTTerm').val(mtc).change();

	// });

	function search_serial()
	{
		var title = null;
		$('#txtSearch').val().trim() == "" ? title = "~!@#$%^&*()_+" : title = $('#txtSearch').val().trim();

		$('.serialform').empty();
		$('.volumeform').empty();
		$('.issueform').empty();

		$.ajax({
			url:'<?php echo site_url('analytics_controller/load_serials')?>',
			method: 'post',
			data: {title: title},
			dataType: 'json',
			success: function(data){

				var sss = [];
				var vvv = [];
				var iii = [];
				var s;
				var v;
				var i;

				for(var x in data['serials'])
				{
					sss.push(data['serials'][x]);
				}

				for(var x in data['volumes'])
				{
					vvv.push(data['volumes'][x]);
				}

				for(var x in data['issues'])
				{
					iii.push(data['issues'][x]);
				}

				for(s = 0; s < sss.length; s++)
				{
					$('.serialform').append('<li class="treeview" ><a href="#" class="texts" style="background: #fff;"><i class="fa fa-book"></i> <span>'+sss[s]['Title']+'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu '+sss[s]['HoldingsID']+'" style="background: #fff;"><div class="volumeform'+sss[s]['HoldingsID']+'"></div><div><a type="button" onclick="view_all(\'' + sss[s]['HoldingsID'] + '\')" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlViewAll" style="display: block;">View All Volumes and Issues</a></div></ul></li><br>');

					for(v = 0; v < vvv.length; v++)
					{
						if(sss[s]['HoldingsID'] == vvv[v]['HoldingsID'])
						{
							$('.volumeform'+sss[s]['HoldingsID']+'').append('<li class="treeview"><a href="#" class="texts"><i class="fa fa-circle-o"></i> <span>Volume '+vvv[v]['Volume']+'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu '+sss[s]['HoldingsID']+'" style="background: #fff"><div class="issueform'+vvv[v]['HoldingsID']+''+vvv[v]['Volume']+'"></div></ul></li>');

							for(i = 0; i < iii.length; i++)
							{
								if(vvv[v]['HoldingsID'] == iii[i]['HoldingsID'] && vvv[v]['Volume'] == iii[i]['Volume'])
								{
									$('.issueform'+vvv[v]['HoldingsID']+''+vvv[v]['Volume']+'').append('<li class="treeview isactive"><a class="handhover texts" id='+iii[i]['IssueNumber']+'" onclick="load_table(\'' + iii[i]['HoldingsID'] + '\', '+iii[i]['Volume']+', '+iii[i]['IssueNumber']+')"><iclass="fa fa-circle-o"></i><span>Issue Number '+iii[i]['IssueNumber']+'</span></a></li>');
								}
							}
						}
					}
				}

				// data['serials'].forEach(function(serial){
				//   $('.serialform').append('<li class="treeview"><a href="#" class="texts" style="background: #fff"><i class="fa fa-book"></i> <span>'+serial['Title']+'</span></a><ul class="treeview-menu '+serial['HoldingsID']+'" style="background: #fff;"><div class="volumeform"></div></ul></li>');

				//  	data['volumes'].forEach(function(volume){
				// 		if(serial['HoldingsID'] == volume['HoldingsID'])
				// 		{
				// 			$('.volumeform').append('<li class="treeview"><a href="#" class="texts"><i class="fa fa-circle-o"></i> <span>Volume '+volume['Volume']+'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu '+serial['HoldingsID']+'" style="background: #fff"><div class="issueform"></div></ul></li>');

				// 			data['issues'].forEach(function(issue){
				// 				if(volume['HoldingsID'] == issue['HoldingsID'] && volume['Volume'] == issue['Volume'])
				// 				{
				// 					$('.issueform').append('<li class="treeview isactive"><a class="handhover texts" id='+issue['IssueNumber']+'" onclick="load_table(\'' + issue['HoldingsID'] + '\', '+issue['Volume']+', '+issue['IssueNumber']+')"><iclass="fa fa-circle-o"></i><span>Issue Number '+issue['IssueNumber']+'</span></a></li>');
				// 				}
				// 			});
				// 		}
				// 	});
				// });

				// $.each(data['serials'],function(i,val){
				// 	$('.serialform').append('<li class="treeview"><a href="#" class="texts" style="background: #fff"><i class="fa fa-book"></i> <span>'+val['Title']+'</span></a><ul class="treeview-menu '+val['HoldingsID']+'" style="background: #fff;"><div class="volumeform"></div></ul></li>');
					
				// 	$.each(data['volumes'],function(i2,val2){
				// 		if(val['HoldingsID'] == val2['HoldingsID'])
				// 		{
				// 			$('.volumeform').append('<li class="treeview"><a href="#" class="texts"><i class="fa fa-circle-o"></i> <span>Volume '+val2['Volume']+'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu '+val['HoldingsID']+'" style="background: #fff"><div class="issueform"></div></ul></li>');

				// 			$.each(data['issues'],function(i3,val3){
				// 				if(val2['HoldingsID'] == val3['HoldingsID'] && val2['Volume'] == val3['Volume'])
				// 				{
				// 					$('.issueform').append('<li class="treeview isactive"><a class="handhover texts" id='+val3['IssueNumber']+'" onclick="load_table(\'' + val3['HoldingsID'] + '\', '+val3['Volume']+', '+val3['IssueNumber']+')"><iclass="fa fa-circle-o"></i><span>Issue Number '+val3['IssueNumber']+'</span></a></li>');
				// 				}
				// 			});
				// 		}
				// 	});
				// });
			}
		});
	}

	function view_all(holdingsid)
	{
		var table = $('#tblViewAll').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_viewall") ?>',
			type: "POST",
			dataType: "json",
			data: {holdingsid: holdingsid},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblViewAll').dataTable().fnAddData( 
						[
						data.data[x].Volume,
						data.data[x].Issue,
						data.data[x].Title
						]);
				}
			}     
		});
	}

	function load_data(id)
	{
		$("." + id).show(1000);
	}	

	function load_table(holdingsid, volume, issuenum)
	{
		// alert(holdingsid + ' ' + volume + ' ' + issuenum);

		$('#dt').show();

		var table = $('#tblAnalytics').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_analytics") ?>',
			type: "POST",
			dataType: "json",
			data: {holdingsid: holdingsid, volume: volume, issuenum: issuenum},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAnalytics').dataTable().fnAddData( 
						[
						data.data[x].Title,
						data.data[x].Author,
						data.data[x].Subject,
						data.data[x].Attachments,
						data.data[x].Qwe
						]);
				}
			}     
		});
	}

	function load_table2(holdingsid, volume, issuenum)
	{
		// $('#issuenum').addClass("isactive");

		var table = $('#tblAnalytics2').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_analytics") ?>',
			type: "POST",
			dataType: "json",
			data: {holdingsid: holdingsid, volume: volume, issuenum: issuenum},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAnalytics2').dataTable().fnAddData( 
						[
						data.data[x].Title,
						data.data[x].Author,
						data.data[x].Subject,
						data.data[x].Attachments
						]);
				}
			}     
		});
	}

	function load_table3(id)
	{
		// $('#issuenum').addClass("isactive");

		var table = $('#tblAuthors').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_authors") ?>',
			type: "POST",
			dataType: "json",
			data: {id: id},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAuthors').dataTable().fnAddData( 
					[
						data.data[x].AuthorID,
						data.data[x].AuthorTag,
						data.data[x].AuthorName
					]);
				}
			}     
		});
	}

	function load_table4(id)
	{
		// $('#issuenum').addClass("isactive");

		var table = $('#tblSubjects').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_subjects") ?>',
			type: "POST",
			dataType: "json",
			data: {id: id},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblSubjects').dataTable().fnAddData( 
					[
						data.data[x].SubjectID,
						data.data[x].SubjectType,
						data.data[x].Subject
					]);
				}
			}     
		});
	}

	function load_table5(id)
	{
		// $('#issuenum').addClass("isactive");

		var table = $('#tblAttachments').DataTable();

		var rows = table
		.rows()
		.remove()
		.draw();

		$.ajax({
			url: '<?php echo site_url("analytics_controller/load_attachments") ?>',
			type: "POST",
			dataType: "json",
			data: {id: id},
			success: function(data) {
				for(var x = 0; x < data.data.length; x++)
				{
					$('#tblAttachments').dataTable().fnAddData( 
					[
						data.data[x].MultimediaID,
						data.data[x].FileName,
						data.data[x].FileType,
						// data.data[x].FileLocation,
						data.data[x].Attachment,
						data.data[x].Action,
						data.data[x].Restricted
					]);
				}
			}     
		});
	}

	function refresh()
	{
		window.location.href = "<?php echo base_url('holdings/analytics');?>";
	}

	function edit_record(id)
	{
		$('a[href="#tab_2"]').tab('show');
		save_method = "edit";

		$.ajax(
		{  
			url:"<?php echo site_url("analytics_controller/get_analytic")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#txtAnalyticsID').val(data.AnalyticsID);
				$('#txtHoldingsID').val(data.HoldingsID);

				$('#cboJournal').val(data.HoldingsID).change();
				$('#cboVolume2').val(data.Volume).change();
				$('#cboIssueNo2').val(data.IssueNumber).change();

				$('#cboLocation').val(data.Location).change();

				$('#txtCatSource').val(data.CatalogSource);
				$('#cboLanguage').val(data.LanguageID).change();
				$('#cboBroadClass').val(data.BroadClassID).change();
				$('#txtClassificationNum').val(data.ClassNum);
				$('#txtAuthorNum').val(data.AuthorNum);
				$('#txtPublicationDate').val(data.PubDate);

				$('#txtTitle').val(data.Title);
				$('#txtRmndrTitle').val(data.RmndrTitle);
				$('#txtStmntRspnsblty').val(data.StmntRspnsblty);

				$('#txtExtent').val(data.Extent);
				$('#txtOtherPhysical').val(data.OtherPhysical);
				// $('#txtDimensions').val(data.Dimensions);

				$('#cboMTTerm').val(data.MediaTypeID).change();
				$('#txtMTSource').val(data.MediaTypeSource);

				$('#mdlAuthorTitle').text(data.Title + " Authors Entry");
				$('#mdlSubjectTitle').text(data.Title + " Subjects Entry");
				$('#mdlAttachmentTitle').text(data.Title + " Attachments Entry");

				$('.one').hide();
				$('.two').show();

				load_table2(data.HoldingsID, data.Volume, data.IssueNumber);
			}  
		});
	}

	function edit_author(id, type)
	{
		save_method2 = "edit";

		$.ajax(
		{  
			url:"<?php echo site_url("analytics_controller/get_author")?>/"+id,  
			method:"POST",  
			data:{id:id, type:type},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#divAuthor').find('input').val("");
				$('#divAuthor').find('select').val("0").change();
				$('#txtAnalyticsID').val(data.txtAnalyticsID);
				$('#txtAuthorID').val(data.txtAuthorID);
				$('#cboAuthor').val(data.cboAuthor).change();

				if(type == "100")
				{
					$('#cbo100').val(data.cbo100).change();
					$('#txt100a').val(data.txt100a);  
					$('#txt100b').val(data.txt100b);  
					$('#txt100c').val(data.txt100c);  
					$('#txt100e').val(data.txt100e);  
					$('#txt100d').val(data.txt100d);  
					$('#txt100q').val(data.txt100q);  
					$('#txt100u').val(data.txt100u);
				}
				
				if(type == "110")
				{
					$('#cbo110').val(data.cbo110).change();
					$('#txt110a').val(data.txt110a);  
					$('#txt110b').val(data.txt110b);  
					$('#txt110c').val(data.txt110c);  
					$('#txt110d').val(data.txt110d);  
					$('#txt110n').val(data.txt110n); 
				}

				if(type == "700")
				{
					$('#cbo700').val(data.cbo700).change();
					$('#txt700a').val(data.txt700a);  
					$('#txt700b').val(data.txt700b);  
					$('#txt700c').val(data.txt700c);  
					$('#txt700e').val(data.txt700e);  
					$('#txt700d').val(data.txt700d);  
					$('#txt700q').val(data.txt700q);  
					$('#txt700u').val(data.txt700u);
				}

				if(type == "710")
				{
					$('#cbo710').val(data.cbo710).change();
					$('#txt710a').val(data.txt710a);  
					$('#txt710b').val(data.txt710b);  
					$('#txt710c').val(data.txt710c);  
					$('#txt710d').val(data.txt710d);  
				}
				 
			}  
		});
	}

	function edit_subject(id, type)
	{
		save_method3 = "edit";

		$.ajax(
		{  
			url:"<?php echo site_url("analytics_controller/get_subject")?>/"+id,  
			method:"POST",  
			data:{id:id, type:type},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#divSubject').find('input').val("");
				$('#txtAnalyticsID').val(data.txtAnalyticsID);
				$('#txtSubjectID').val(data.txtSubjectID);
				$('#cboSubject').val(data.cboSubject).change();

				if(type == "600")
				{
					$('#txt600a').val(data.txt600a);  
					$('#txt600c').val(data.txt600c);  
					$('#txt600x').val(data.txt600x);  
					$('#txt600v').val(data.txt600v);  
					$('#txt600y').val(data.txt600t);  
					$('#txt600z').val(data.txt600z);
				}
				
				if(type == "610")
				{
					$('#txt610a').val(data.txt610a);  
					$('#txt610b').val(data.txt610b);  
					$('#txt610x').val(data.txt610x);  
					$('#txt610v').val(data.txt610v);  
					$('#txt610y').val(data.txt610y);  
					$('#txt610z').val(data.txt610z);
				}

				if(type == "611")
				{
					$('#txt611a').val(data.txt611a);  
					$('#txt611d').val(data.txt611d);  
					$('#txt611c').val(data.txt611c); 
				}

				if(type == "630")
				{
					$('#txt630a').val(data.txt630a);  
					$('#txt630x').val(data.txt630x);  
					$('#txt630v').val(data.txt630v); 
				}

				if(type == "650")
				{
					$('#txt650a').val(data.txt650a); 
					$('#txt650x').val(data.txt650x);  
					$('#txt650v').val(data.txt650v);  
					$('#txt650y').val(data.txt650y);  
					$('#txt650z').val(data.txt650z);
				}

				if(type == "651")
				{
					$('#txt651a').val(data.txt651a);  
					$('#txt651x').val(data.txt651x);  
					$('#txt651v').val(data.txt651v); 
				}
				 
			}  
		});
	}

	function edit_location(id)
	{
		save_method4 = "edit";

		$.ajax(
		{  
			url:"<?php echo site_url("analytics_controller/get_location")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{   
				$('#divLocation').find('input').val("");
				$('#txtLocationID').val(data.txtLocationID);
				$('#txtLocation').val(data.txtLocation);
				$('#cboMaterialType').val(data.cboMaterialType).change();
			}  
		});
	}

	function edit_authors(id)
	{
		edit_record(id);
		load_table3(id);
	}

	function edit_subjects(id)
	{
		edit_record(id);
		load_table4(id);
	}

	function edit_attachments(id)
	{
		edit_record(id);
		load_table5(id);
	}

	function qwe(id)
	{
		$.ajax(
		{
			url:"<?php echo base_url("Analytics_controller/set_id")?>", 
			type: "POST",
			data:{id:id}, 
			dataType: "JSON",
			success:function(data)  
			{
			  if(data.status)
			    window.location.href = "<?php echo site_url('qwe/qwe');?>";
			}  
		});
	}

	function save_record()
	{
		if(!$('.one').is(':visible'))
		{
			$('.one').show();
			$('.two').hide();
			$('#cboVolume').val($('#cboVolume2').val()).change();
			$('#cboIssueNo').val($('#cboIssueNo2').val()).change();
		} 


		if($('#cboJournal').val() == "" || $('#cboVolume').val() == "" || $('#cboIssueNo').val() == "")
		{
			toastr.warning("Please select a Journal Title, Volume Number and Issue Number.");
			scroll_top();
			return;
		}

		var url;

		if(save_method == "add")
			url = '<?php echo site_url('analytics_controller/create_record')?>';
		else
			url = '<?php echo site_url('analytics_controller/update_record')?>';

		var serialize = $('input, select').serialize() + "&Journal=" + $( "#cboJournal option:selected" ).text();

		$.ajax(
		{  
			url : url,
			type: "POST",
			data:  serialize,
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status  == 'success')
				{
					toastr.success(data.message);
					save_method == 'add' ? logThis(1, "analytics") : logThis(2, "analytics");
					load_table($('#txtHoldingsID').val(),$('#cboVolume2').val(),$('#cboIssueNo2').val());
					load_table2($('#txtHoldingsID').val(),$('#cboVolume2').val(),$('#cboIssueNo2').val());
					clear_fields();
					save_method = 'add';
				} 
				else if(data.status == 'error')
				{
					toastr.error(data.message);
				}
				else if(data.status == 'validation error')
				{	
					scroll_top();
					$('#txtTitle').addClass("redph");
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
					}
				}
			}  
		});
	}

	function save_author()
	{
		var url;

		if($('#cboAuthor').val() == "")
		{
			toastr.warning("Please select an Author Type.");
			return;
		}

		if(save_method2 == "add")
			url = '<?php echo site_url('analytics_controller/create_author')?>';
		else
			url = '<?php echo site_url('analytics_controller/update_author')?>';

		var serialize = $('input, select').serialize();

		$.ajax(
		{  
			url : url,
			type: "POST",
			data:  serialize,
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status  == 'success')
				{
					toastr.success(data.message);
					load_table3($('#txtAnalyticsID').val());

					save_method2 == 'add' ? logThis(1, "author") : logThis(2, "author");
					save_method2 = 'add';

					clear_author();
				} 
				else 
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
					}
				}
			}  
		});
	}

	function save_subject()
	{
		var url;

		if($('#cboSubject').val() == "")
		{
			toastr.warning("Please select a Subject Type.");
			return;
		}

		if(save_method3 == "add")
			url = '<?php echo site_url('analytics_controller/create_subject')?>';
		else
			url = '<?php echo site_url('analytics_controller/update_subject')?>';

		var serialize = $('input, select').serialize();

		$.ajax(
		{  
			url : url,
			type: "POST",
			data:  serialize,
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status  == 'success')
				{
					toastr.success(data.message);
					load_table4($('#txtAnalyticsID').val());

					save_method3 == 'add' ? logThis(1, "subject") : logThis(2, "subject");
					save_method3 = 'add';

					clear_subject();
				} 
				else 
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
					}
				}
			}  
		});
	}

    function save_permission(id)
	{
		$.ajax(
		{  
			url:"<?php echo site_url("Analytics_controller/update_attachment")?>/"+id,
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)
			{
				$('#txtRestrict').val(data.Restrict);

				if($('#txtRestrict').val() == 1)
				{
					toastr.info("Permission for "+data.UploadName+" is changed to Unrestricted");
				}
				else
				{
					toastr.info("Permission for "+data.UploadName+" is changed to Restricted");
				}
			}
		});
	}

	function save_location()
	{
		var url;

		if(save_method4 == "add")
			url = '<?php echo site_url('analytics_controller/create_location')?>';
		else
			url = '<?php echo site_url('analytics_controller/update_location')?>';

		var serialize = $('input, select').serialize();

		$.ajax(
		{  
			url : url,
			type: "POST",
			data:  serialize,
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status  == 'success')
				{
					toastr.success(data.message);
				
					save_method4 == 'add' ? logThis(1, "location") : logThis(2, "location");
					save_method4 = 'add';

					clear_location();
				} 
				else 
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
					}
				}
			}  
		});
	}

	$(document).ready(function(){  
		$('#form_multimedia').on('submit', function(e){  
			e.preventDefault();  
			if($('#attachment').val() == '')  
			{  
				toastr.error("Select file to upload!");
			}  
			else  
			{  
				$.ajax({  
					url: "<?php echo base_url(); ?>Analytics_controller/create_attachment",
					method: "POST",  
					dataType: 'json',
					data: new FormData(this),  
					contentType: false,  
					cache: false,  
					processData: false,
					success:function(data) 
					{  
						if(data.status == 'success')
						{
							toastr.success(data.message); 
							clear_attachments();
							load_table5($('#txtAnalyticsID').val());
						}
						else if(data.status == 'error')
						{
							toastr.error(data.message);
						}
					}
                });  
			}  
		});  
	}); 

	function delete_record(id, type)
	{
		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					data:{id:id, type:type}, 
					url : "<?php echo site_url('Analytics_controller/delete_record')?>",
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						if(data.status == 'success')
						{
							toastr.success(data.message);

							logThis(3, type);

							if(type == "analytics")
							{
								load_table($('#txtHoldingsID').val(),$('#cboVolume2').val(),$('#cboIssueNo2').val());
								load_table2($('#txtHoldingsID').val(),$('#cboVolume2').val(),$('#cboIssueNo2').val());
								clear_fields();
							}
							else if(type == "author")
							{
								load_table3($('#txtAnalyticsID').val());
								clear_author();
							} 
							else if(type == "subject")
							{
								load_table4($('#txtAnalyticsID').val());
								clear_subject();
							}
							else
							{
								clear_location();
							}
							
						}
						else
						{
							toastr.success(data.message);
						}
						
					}
				});
			}
		}
		else
			toastr.warning("Nothing to delete.");
	}

	function delete_attachment(id)
	{
		if(confirm('Are you sure you want to delete this attachment?')){
			$.ajax({
				data:{id:id}, 
				url : "<?php echo site_url('Analytics_controller/delete_attachment')?>",
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					if(data.status == 'success')
					{
						toastr.success(data.message);
						load_table5($('#txtAnalyticsID').val());
					}
					else
					{
						toastr.success(data.message);
					}
					
				}
			});
		}
	}
	
	function logThis(id, type)
	{
		var serialize, author, subject, location;

		if(type == "analytics")
		{
			serialize = $('input').serialize() + "&txtName=" + $('[name="txtTitle"]').val() + "&modulefeature=Analytics" + "&id=" + id;
		}

		if(type == "author")
		{
			if($('#cboAuthor').val() == "100")
			author = $('#txt100a').val();
			if($('#cboAuthor').val() == "110")
				author = $('#txt110a').val();
			if($('#cboAuthor').val() == "700")
				author = $('#txt700a').val();
			if($('#cboAuthor').val() == "710")
				author = $('#txt710a').val();

			serialize = $('input').serialize() + "&txtName=" + author + "&modulefeature=Analytics Author" + "&id=" + id;
		}

		if(type == "subject")
		{
			if($('#cboSubject').val() == "600")
			subject = $('#txt600a').val();
			if($('#cboSubject').val() == "610")
				subject = $('#txt610a').val();
			if($('#cboSubject').val() == "611")
				subject = $('#txt611a').val();
			if($('#cboSubject').val() == "630")
				subject = $('#txt630a').val();
			if($('#cboSubject').val() == "650")
				subject = $('#txt650a').val();
			if($('#cboSubject').val() == "651")
				subject = $('#txt651a').val();

			serialize = $('input').serialize() + "&txtName=" + subject + "&modulefeature=Analytics Subject" + "&id=" + id;
		}

		if(type == "dt")
		{
			serialize = $('input').serialize() + "&txtName=" + " " + "&modulefeature=Analytics View All" + "&id=" + id;
		}

		if(type == "location")
		{
			location = $('#txtLocationID').val();
			serialize = $('input').serialize() + "&txtName=" + location + "&modulefeature=Analytics Location" + "&id=" + id;
		}

		$.ajax(
		{  
			url : "<?php echo site_url('analytics_controller/create_log')?>/"+0,
			type: "POST",
			data: serialize,
			dataType: "JSON",
			success:function(data)  
			{

			}  
		});  
	} 

	function clear_fields()
	{
		$('input').val("");
		$('#txtTitle').removeAttr('placeholder');
		$('#txtTitle').removeClass("redph");
		// $('#txtAuthor').removeAttr('placeholder');

		// $('#cboJournal').val('0').change();
		// $('#cboVolume').val('0').change();
		// $('#cboIssueNo').val('0').change();

		// $('#cboVolume2').val('0').change();
		// $('#cboIssueNo2').val('0').change();

		$('#cboLanguage').val('1').change();
		$('#cboBroadClass').val('1').change();
		$('#cboMTTerm').val('1').change();

		if(!$('.one').is(':visible'))
		{
			$('.one').show();
			$('.two').hide();
		} 
		
		$('#tblAuthors').DataTable().ajax.reload(null, false);
		$('#tblSubjects').DataTable().ajax.reload(null, false);

		save_method = 'add';
		save_method2 = 'add';
		save_method3 = 'add';
	}

	function clear_author()
	{
		$('#divAuthor').find('input').val("");
		$('#divAuthor').find('select').val("0").change();
		$('#divAuthor').find('input').parent().parent().removeClass('has-error');
		$('#divAuthor').find('input').removeAttr('placeholder');
		$('#txtAuthorID').val("");
		save_method2 = 'add';
	}

	function clear_subject()
	{
		$('#divSubject').find('input').val("");
		$('#divSubject').find('input').parent().parent().removeClass('has-error');
		$('#divSubject').find('input').removeAttr('placeholder');
		$('#txtSubjectID').val("");
		save_method3 = 'add';
	}

	function clear_attachments()
	{
		$('#attachment').val("");
	}

	function clear_location()
	{
		$('#divLocation').find('input').val("");
		$('#divLocation').find('input').parent().parent().removeClass('has-error');
		$('#divLocation').find('input').removeAttr('placeholder');
		$('#cboMaterialType').val(0).change();
		$('#txtLocationID').val("");
		$('#tblLocations').DataTable().ajax.reload(null, false);
		save_method4 = 'add';

		$.ajax({
			url:'<?php echo site_url('analytics_controller/load_location_dropdown')?>',
			method: 'post',
			dataType: 'json',
			success: function(response){

				$('#cboLocation').find('option').not(':first').remove();

				$.each(response,function(index,data){
					$('#cboLocation').append('<option value="'+data['LocationID']+'">'+data['Location']+'</option>');
				});
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

	$(function () {
	    // when the modal is closed
	    $('#mdlAuthor').on('hidden.bs.modal', function () {
	        $('#cboAuthor').val("").change();
	        clear_author();
	    });

	    $('#mdlSubject').on('hidden.bs.modal', function () {
	        $('#cboSubject').val("").change();
	        clear_subject();
	    });

	    $('#mdlAttachments').on('hidden.bs.modal', function () {
	        clear_attachments();
	    });
	});



</script>

<style type="text/css">

	.chorva {
		background: #3c8dbc !important;
		color: #fff !important;
	}

	.texts {
		color: #3c8dbc !important;
	}

	.texts:hover {
		background-color: #83C4FB;
	}

	.menu-open.isactive{
		background-color: #83C4FB;
	}

	.texts2 {
		color: #333 !important;
	}

	.grid-divider {
		position: relative;
		padding: 0;
	}
	.grid-divider>[class*='col-'] {
		position: static;
	}
	.grid-divider>[class*='col-']:nth-child(n+2):before {
		content: "";
		border-left: 1px solid #DDD;
		position: absolute;
		top: 0;
		bottom: 0;
	}
	.col-padding {
		padding: 0 15px;
	}

	table.dataTable tbody th,
	table.dataTable tbody td {
	    white-space: nowrap;
	}

	table tr td:first-of-type {
		cursor: pointer;
		}

	.sidebar-menu li>a>.pull-right-container  {
	    position: static; 
	    right: 10px;
	    top: 50%;
	    margin-top: -7px;
	}

	.select2-container--default .select2-selection--single .select2-selection__placeholder {
	     color: gray; 
	     opacity: 0.8; 
	}

	dd{
		margin-left: 25px !important;
	}

	.skin-blue .sidebar-form input[type="text"], .skin-blue .sidebar-form .btn {
	    box-shadow: none;
	    background-color: #eee;
	    border: 1px solid transparent;
	    height: 35px;
	}
</style>