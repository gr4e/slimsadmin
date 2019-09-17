<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/AuthorsTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="divauthor"> <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Authors
        </h1>
        <ol class="breadcrumb">
            <li> <a href="<?php echo site_url('holdings/home');?>"><i class="fa fa-home"></i> Home</a> </li>
            <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
            <li class="active"><i class="fa fa-user"></i>Author</li>
        </ol>
    </section>
    <br>

    <!-- Data Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $id ?></h3>
            <h3 class="box-title"> <b> - <?php echo $title ?> </b></h3>

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
                            <table id="tblAuthors" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="1">Author ID</th>
                                        <th rowspan="1">Author Tag</th>
                                        <th rowspan="1">Author Name</th>
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
            <h3 class="box-title">Author Data Entry</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapseauthor" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
            </div>
        </div>

        <div class="collapseauthor" id="collapseExample">
            <form id="form">
                <!-- Author ID -->
                <input name="AuthorID" id="AuthorID" hidden="hidden">
                <input name="Author" id="Author" hidden="hidden">
                <input name="PublicationStatus" id="PublicationStatus" hidden="hidden">
                <input name="HoldingsID" id="HoldingsID" value="<?php echo $id ?>" hidden="hidden" />

                <div class="box-body">
                    <label class="col-sm-3">Author</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-fw fa-user"></i>
                        </div>
                        <select field-type="Select" name="cboAuthor" id="cboAuthor" class="form-control select2" style="width: 100%;">
                            <option></option>
                            <option value="100">Personal</option>
                            <option value="110">Corporate</option>
                            <option value="700">Added Personal</option>
                            <option value="710">Added Corporate</option>
                        </select>

                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                            <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
                        </div>

                        <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                </div>

                <div class="box-body">
                    <div id="divPersonalAuthor" style="display: none;" class="">
                        <div class="box">
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h4>Personal Author</h4>

                                    <div class="box-body">
                                        <label class="col-sm-3">Author Entry</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100</i>
                                            </div>
                                            <select field-type="Select" name="cboAuthorEntry100" id="cboAuthorEntry100" class="form-control select2" style="width: 100%;">
                                                <option value="0">Forename</option>
                                                <option value="1">Surname</option>
                                                <option value="3">Family Name</option>
                                            </select>

                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3"> Personal Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100a</i>
                                            </div>

                                            <input name="PersonalName100" id="PersonalName100" type="text" class="form-control redph" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Numeration</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100b</i>
                                            </div>
                                            <input name="Numeration100" id="Numeration100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Titles and words associated with a name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100c</i>
                                            </div>

                                            <input name="TitlesAndWords100" id="TitlesAndWords100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Relator Term</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100e</i>
                                            </div>

                                            <input name="RelatorTerm100" id="RelatorTerm100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Dates Associated with a Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100d</i>
                                            </div>

                                            <input name="DateAssociatedWith100" id="DateAssociatedWith100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Fuller Form of Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100q</i>
                                            </div>

                                            <input name="FullerFormofName100" id="FullerFormofName100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Affiliation </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>100u</i>
                                            </div>

                                            <input name="Affiliation100" id="Affiliation100" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="divAddedPersonal" style="display: none;" class="">
                        <div class="box">
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h4>Added Personal Author</h4>

                                    <div class="box-body">
                                        <label class="col-sm-3">Author Entry</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700</i>
                                            </div>

                                            <select field-type="Select" name="cboAuthorEntry700" id="cboAuthorEntry700" class="form-control select2" style="width: 100%;">
                                                <option value="0"> Forename</option>
                                                <option value="1"> Surname</option>
                                                <option value="3"> Family Name</option>
                                            </select>

                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.box body -->
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3"> Personal Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700a</i>
                                            </div>

                                            <input name="PersonalName700" id="PersonalName700" type="text" class="form-control redph" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Numeration</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700b</i>
                                            </div>
                                            <input name="Numeration700" id="Numeration700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Titles and Words Associated with a Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700c</i>
                                            </div>

                                            <input name="TitlesAndWords700" id="TitlesAndWords700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Relator Term</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700e</i>
                                            </div>

                                            <input name="RelatorTerm700" id="RelatorTerm700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Dates Associated with a Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700d</i>
                                            </div>

                                            <input name="DateAssociatedWith700" id="DateAssociatedWith700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Fuller Form of Name </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700q</i>
                                            </div>

                                            <input name="FullerFormofName700" id="FullerFormofName700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Affiliation </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>700u</i>
                                            </div>

                                            <input name="Affiliation700" id="Affiliation700" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="divCorporateAuthor" style="display: none;" class="">
                        <div class="box">
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h4>Corporate Author</h4>

                                    <div class="box-body">
                                        <label class="col-sm-3">Corporate Author Entry</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110</i>
                                            </div>

                                            <select field-type="Select" name="cboAuthorEntry110" id="cboAuthorEntry110" class="form-control select2" style="width: 100%;">
                                                <option value="0"> Inverted Name</option>
                                                <option value="1" selected="1"> Jurisdiction Name</option>
                                                <option value="2"> Name in direct order</option>
                                            </select>

                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.box body -->
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3"> Corporate Name or Jurisdiction Name as Entry Element </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110a</i>
                                            </div>

                                            <input name="CorporateNameorJurisdictionName110" id="CorporateNameorJurisdictionName110" type="text" class="form-control redph" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Subordinate Unit </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110b</i>
                                            </div>
                                            <input name="SubordinateUnit110" id="SubordinateUnit110" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Location of Meeting </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110c</i>
                                            </div>

                                            <input name="LocationofMeeting110" id="LocationofMeeting110" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Date of Meeting or Treaty Signing </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110d</i>
                                            </div>

                                            <input name="DateofMeetingorTreatySigning110" id="DateofMeetingorTreatySigning110" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Number of Part/Section/Meeting </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>110n</i>
                                            </div>

                                            <input name="NumberofPartSectionMeeting110" id="NumberofPartSectionMeeting110" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="divAddedCorporate" style="display: none;" class="">
                        <div class="box">
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h4>Added Corporate Author</h4>

                                    <div class="box-body">
                                        <label class="col-sm-3">Corporate Author Entry</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>710</i>
                                            </div>
                                            <select field-type="Select" name="cboAuthorEntry710" id="cboAuthorEntry710" class="form-control select2" style="width: 100%;">

                                                <option value="0"> Inverted Name</option>
                                                <option value="1" selected="1"> Jurisdiction Name</option>
                                                <option value="2"> Name in direct order</option>
                                            </select>

                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.box body -->
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3"> Corporate Name or Jurisdiction Name as Entry Element </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>710a</i>
                                            </div>

                                            <input name="CorporateNameorJurisdictionName710" id="CorporateNameorJurisdictionName710" type="text" class="form-control redph" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Subordinate Unit </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>710b</i>
                                            </div>
                                            <input name="SubordinateUnit710" id="SubordinateUnit710" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Location of Meeting </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>710c</i>
                                            </div>

                                            <input name="LocationofMeeting710" id="LocationofMeeting710" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Date of Meeting or Treaty Signing </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>710d</i>
                                            </div>

                                            <input name="DateofMeetingorTreatySigning710" id="DateofMeetingorTreatySigning710" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="divSubmit" style="display: none;">
                        <div class="form-group pull-right">
                            <button type="button" onclick="save_record_authors()" id="btnSubmit" class="btn btn-primary"><label id="lblSubmit">Submit
                                </label></button>
                            <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
                            <button action="cancel" onclick="delete_author_records()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="box-footer">
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<script type="text/javascript">

    $(document).ready(function() 
    {
        $('#tblAuthors').DataTable({
            //"pageLength": 5,
            "scrollX": true,
            "ajax": {
                url: "<?php echo site_url("holdings_controller/author_datatable") ?>",
                type: 'POST',
                data: {
                    id: $('#HoldingsID').val()
                },
                dataType: "json"
            },
            "dom": 'Bfrtip',
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'Copy',
                    className: 'opt_icon opt_icon1c',
                    title: 'Authors'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'CSV',
                    className: 'opt_icon opt_icon2c',
                    filename: 'Authors'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'Excel',
                    className: 'opt_icon opt_icon3c',
                    filename: 'Authors'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'PDF',
                    className: 'opt_icon opt_icon4c',
                    filename: 'Authors'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    className: 'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
            ],
            "columnDefs": [{
                "targets": [-1],
                "orderable": false
            }]
        });

        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            // $(this).next().empty();
        });
    });

    $(document).ready(function() 
    {
        $("#collapseExample").on("hide.bs.collapse", function() {
            $("#divcollapseauthor").html('<i class="fa fa-plus"></i>');
        });
        $("#collapseExample").on("show.bs.collapse", function() {
            $("#divcollapseauthor").html('<i class="fa fa-minus"></i>');
        });
    });

    function edit_author(id, iAuthor, hid) 
    {
        scroll_top();

        $('#lblSubmit').text("Save");
        if (!$("#form").is(":visible"))
            $('#divcollapse').click();

        $.ajax({
            url: "<?php echo site_url("holdings_controller/authors_edit")?>/",
            method: "POST",
            data: {
                id: id,
                iAuthor: iAuthor,
                hid: hid
            },
            dataType: "json",
            success: function(data) 
            {
                //for retrieving data in tblindices
                $('#AuthorID').val(data.AuthorID);
                $('#Author').val(data.Author);
                $('#PublicationStatus').val(data.PublicationStatus);
                $('#HoldingsID').val(data.HoldingsID);
                $('#cboAuthor').val(data.cboAuthor).change();

                //load data if corporate author
                if (iAuthor = 110) 
                {
                    $('#cboAuthorEntry110').val(data.cboAuthorEntry110).change();
                    $('#CorporateNameorJurisdictionName110').val(data.CorporateNameorJurisdictionName110);
                    $('#SubordinateUnit110').val(data.SubordinateUnit110);
                    $('#LocationofMeeting110').val(data.LocationofMeeting110);
                    $('#DateofMeetingorTreatySigning110').val(data.DateofMeetingorTreatySigning110);
                    $('#NumberofPartSectionMeeting110').val(data.NumberofPartSectionMeeting110);
                }

                //load data if Personal 
                if (iAuthor = 100) 
                {
                    $('#cboAuthorEntry100').val(data.cboAuthorEntry100).change();
                    $('#PersonalName100').val(data.PersonalName100);
                    $('#Numeration100').val(data.Numeration100);
                    $('#TitlesAndWords100').val(data.TitlesAndWords100);
                    $('#RelatorTerm100').val(data.RelatorTerm100);
                    $('#DateAssociatedWith100').val(data.DateAssociatedWith100);
                    $('#FullerFormofName100').val(data.FullerFormofName100);
                    $('#Affiliation100').val(data.Affiliation100);
                }

                //load data if Added Personal
                if (iAuthor = 700) 
                {
                    $('#cboAuthorEntry700').val(data.cboAuthorEntry700).change();
                    $('#PersonalName700').val(data.PersonalName700);
                    $('#Numeration700').val(data.Numeration700);
                    $('#TitlesAndWords700').val(data.TitlesAndWords700);
                    $('#RelatorTerm700').val(data.RelatorTerm700);
                    $('#DateAssociatedWith700').val(data.DateAssociatedWith700);
                    $('#FullerFormofName700').val(data.FullerFormofName700);
                    $('#Affiliation700').val(data.Affiliation700);
                }



                //load data if Added Corporate
                if (iAuthor = 710) 
                {
                    $('#cboAuthorEntry710').val(data.cboAuthorEntry710).change();
                    $('#CorporateNameorJurisdictionName710').val(data.CorporateNameorJurisdictionName710);
                    $('#SubordinateUnit710').val(data.SubordinateUnit710);
                    $('#LocationofMeeting710').val(data.LocationofMeeting710);
                    $('#DateofMeetingorTreatySigning710').val(data.DateofMeetingorTreatySigning710);
                }
            }
        });
    }

    //save author data
    function save_record_authors() 
    {
        $.ajax({
            url: "<?php echo site_url("holdings_controller/authors_create")?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) 
            {
                if (data.status) 
                {
                    $('#tblAuthors').DataTable().ajax.reload(null, false);
                    toastr.success("Record saved successfully.");
                    scroll_top();
                    clear_fields();
                    $('input').parent().parent().removeClass('has-error');

                } 
                else 
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[id="' + data.inputerror[i] + '"]').attr("placeholder", data.error_string[i]);
                    }

                    toastr.warning("Please fill up all required fields.");
                    scroll_top();
                }
            }
        });
    }

    //delete author data
    function delete_author_records() 
    {
        if (confirm('Are you sure you want to delete this record?')) 
        {
            var id = $('#AuthorID').val();
            var hid = $('#HoldingsID').val();
            $.ajax({
                data: {
                    id: id,
                    hid: hid
                },
                url: "<?php echo site_url('holdings_controller/delete_authors')?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    $('#tblAuthors').DataTable().ajax.reload(null, false);
                    clear_fields();
                    scroll_top();
                    toastr.success("Record deleted successfully.");
                }
            });
        }
    }

    //Clear fields
    function clear_fields() 
    {
        $('#form')[0].reset();
        $('#cboAuthor').val('0').change();
        $('#cboAuthorEntry100').val('0').change();
        $('#cboAuthorEntry110').val('0').change();
        $('#cboAuthorEntry700').val('0').change();
        $('#cboAuthorEntry710').val('0').change();
        $('#lblSubmit').text("Submit");
        scroll_top();
    }

    //show hide divs for authors
    $(document).ready(function() 
    {
        $('#cboAuthor').change(function() 
        {
            if ($('#cboAuthor').val() == 100) 
            {
                $('#divSubmit').show();
                $('#divCorporateAuthor').hide('slow');
                $('#divAddedPersonal').hide('slow');
                $('#divAddedCorporate').hide('slow');
                $('#divPersonalAuthor').show('slow');
            } 
            else if ($('#cboAuthor').val() == 110) 
            {
                $('#divSubmit').show();
                $('#divPersonalAuthor').hide('slow');
                $('#divAddedPersonal').hide('slow');
                $('#divAddedCorporate').hide('slow');
                $('#divCorporateAuthor').show('slow');
            } 
            else if ($('#cboAuthor').val() == 700) 
            {
                $('#divSubmit').show();
                $('#divPersonalAuthor').hide('slow');
                $('#divCorporateAuthor').hide('slow');
                $('#divAddedCorporate').hide('slow');
                $('#divAddedPersonal').show('slow');
            } 
            else if ($('#cboAuthor').val() == 710) 
            {
                $('#divSubmit').show();
                $('#divPersonalAuthor').hide('slow');
                $('#divCorporateAuthor').hide('slow');
                $('#divAddedPersonal').hide('slow');
                $('#divAddedCorporate').show('slow');
            } 
            else if ($('#cboAuthor').val() == '') 
            {
                $('#divPersonalAuthor').hide('slow');
                $('#divCorporateAuthor').hide('slow');
                $('#divAddedPersonal').hide('slow');
                $('#divAddedCorporate').hide('slow');
                $('#divSubmit').hide();
            }
        });
    });

    //Function to Scroll top
    function scroll_top() 
    {
        $('html,body').animate({
            scrollTop: $(".entry").offset().top
        }, 'slow');
    }
</script>


<style type="text/css">
    table tr td:last-of-type {
        cursor: pointer;
    }
</style>