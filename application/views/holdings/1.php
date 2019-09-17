<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/HoldingsTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div id="divUncatalog" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-folder-open"></i>Uncatalog</li>
            </ol>
        </section>
        <br>
        <!-- Data Table -->
        <div class="box box-default" >
            <div class="box-header with-border">
                <h3 class="box-title">Uncatalog Records</h3>

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
                                <table id="tblUncatalog" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Holdings ID</th>
                                            <th>Material Type</th>
                                            <th>Title</th>
                                            <th>Call Number</th>
                                            <th>Catalog Number</th>
                                            <th rowspan="1" style="width:105px";>Date of Acquisition</th>
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
    </div>

    <div id="divHoldings" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-folder"></i>Catalog</li>
            </ol>
        </section>
        <br>
        <!-- Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Cataloged Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />
                                <table id="tblHoldings" class="table table-bordered table-striped table-hover" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" style="width:90px">Holdings ID</th>
                                            <th rowspan="1" style="width:100px">Material Type</th>
                                            <th rowspan="1" style="width:400px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Attachments</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divBooks" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Books</li>
            </ol>
        </section>
        <br>
        <!-- Books Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Books Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblBooks" class="table table-bordered table-striped table-hover" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divSerials" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Serials</li>
            </ol>
        </section>
        <br>
        <!-- Serials Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Serials Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblSerials" class="table table-bordered table-striped table-hover" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divTheses" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Theses/Dissertations</li>
            </ol>
        </section>
        <br>
        <!-- Theses Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Theses/Dissertations Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblTheses" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divNonPrints" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">

                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Non Prints</li>

            </ol>
        </section>
        <br>
        <!-- Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Non Prints Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />


                                <table id="tblNonPrints" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->


        </div>
    </div>

    <div id="divInvestigatoryProjects" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">

                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Investigatory Projects</li>

            </ol>
        </section>
        <br>
        <!-- Investigatory Projects Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Investigatory Projects Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblInvestigatoryProjects" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divVerticalFiles" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">

                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Vertical Files</li>

            </ol>
        </section>
        <br>
        <!-- Vertical Files Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Vertical Files Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />


                                <table id="tblVerticalFiles" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divNonPrints" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Non Prints</li>
            </ol>
        </section>
        <br>
        <!-- Non Prints Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Non Prints Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblNonPrints" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divTechnicalReports" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Technical Reports</li>
            </ol>
        </section>
        <br>

        <!-- Technical Reports Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Technical Reports Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />


                                <table id="tblTechnicalReports" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <div id="divReprints" style="display: none;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url('holdings/home');?>" ><i class="fa fa-home"></i> Home</a> </li>
                <li class="active"><i class="fa fa-book"></i>Reprints</li>
            </ol>
        </section>
        <br>

        <!-- Reprints Data Table -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Reprints Records</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-13">
                            <div class="box-body">
                                <input type="hidden" name="material" id="material" value="<?php echo $material ?>" />

                                <table id="tblReprints" class="table table-bordered table-striped table-hover" style="display: none;"> 
                                    <thead>
                                        <tr>
                                            <th rowspan="1" >Holdings ID</th>
                                            <th rowspan="1">Material Type</th>
                                            <th rowspan="1" style="width:300px">Title</th>
                                            <th rowspan="1" style="width:150px">Circulation Number</th>
                                            <th rowspan="1" style="width:150px">Call Number</th>
                                            <th rowspan="1" style="width:125px">Catalog Number</th>
                                            <th rowspan="1" style="width:100px">Catalog Date</th>
                                            <th rowspan="1" style="width:100px">Catalog By</th>
                                            <th rowspan="1">Authors</th>
                                            <th rowspan="1">Publications</th>
                                            <th rowspan="1" style="width:125px">Holdings Copy</th>
                                            <th rowspan="1" style="width:75px">Full Text</th>
                                            <th rowspan="1">Subject</th>
                                            <th rowspan="1" style="width:100px">Cover Page</th>
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
            <!-- End Data Table -->
        </div>
    </div>

    <!-- Main content -->
    <div class="box box-default entry">
        <div class="box-header with-border">
            <h3 class="box-title">Data Entry</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapse" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="collapseExample">
            <form id="form" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">


                        </div>
                    </div> 
                </div>

                <div class="box">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Holdings Id  not visible in form for loading purposes only-->
                            <input name="HoldingsID" id="HoldingsID" hidden="hidden">

                            <!-- MaterialType not visible in form for loading purposes only -->
                            <div class="box-body">
                                <label>Material Type</label> <label id="MaterialType"  hidden="hidden">*</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>006</i>
                                    </div>
                                    <select class="form-control select2" id="cboMaterialType" name="cboMaterialType"  onchange="onMaterialTypeChange()" style="width: 100%; display: none;" >
                                        <?php foreach($types as $type): ?>
                                            <option value="<?php echo $type['MaterialTypeID']; ?>"><?php echo $type['MaterialType']; ?></option>
                                        <?php endforeach; ?>
                                    </select>


                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>


                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>







                            <!-- ISBN -->
                            <div class="box-body" id="divISBN" hidden="hidden" >
                                <label>ISBN</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>020</i>
                                    </div>

                                    <input name="ISBN" id="ISBN" type="text" class="form-control" data-mask">
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- ISSN -->
                            <div class="box-body" id="divISSN" hidden="hidden">
                                <label>ISSN</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>022</i>
                                    </div>
                                    <input name="ISSN" id="ISSN" type="text" class="form-control" data-mask">
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>


                            <!-- Language Code -->
                            <div class="box-body">
                                <label>Language Code</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>041a</i>
                                    </div>
                                    <select field-type="Select" name="cboLanguageID" id="cboLanguageID" class="form-control select2" style="width: 100%;">
                                        <?php foreach($language as $languagecode): ?>
                                            <option value="<?php echo $languagecode['LanguageID']; ?>"><?php echo $languagecode['LanguageName']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- Broad Classification -->
                            <div class="box-body">
                                <label>Broad Classification</label> 

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-text-o" style="width: 13px;"></i>
                                    </div>
                                    <select field-type="Select" name="cboBroadClassification" id="cboBroadClassification" class="form-control select2" style="width: 100%;">

                                        <?php foreach($bclass as $broadclass): ?>
                                            <option value="<?php echo $broadclass['BroadClassID']; ?>"><?php echo $broadclass['BroadClass']; ?></option>
                                        <?php endforeach; ?>


                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>


                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>


                            <!-- Special Coded Dates -->
                            <div class="box-body" id="divSpecialCodedDates" hidden="hidden">
                                <label>Special Coded Dates</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>046</i>
                                    </div>
                                    <input name="SpecialCodedDates" id="SpecialCodedDates" type="text" class="form-control" data-mask">
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>


                            <!-- /.col 6 md -->
                        </div>
                        <!-- /.row -->
                        <div class="col-md-6">
                            <!-- Catalog Number -->
                            <input name="CatalogNumber" id="CatalogNumber" hidden="hidden">

                            <!-- Catalog Date -->
                            <div class="box-body">


                                <div id="divCatalogDate" hidden="hidden">
                                    <label>Catalog Date</label>

                                    <div class="input-group date">
                                        <!-- <input type="text" id="dateandtime" /> -->
                                        <div class="input-group-addon">
                                            <i>005</i>
                                        </div>
                                        <input name="CatalogDate" id="CatalogDate"     class="form-control ">
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>

                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <!-- Catalog Source -->
                                <div class="box-body">
                                    <label>Catalog Source</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>040</i>
                                        </div>
                                        <input name="CatalogSource" id="CatalogSource"  type="text" class="form-control redph" data-mask>
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.box body -->
                                </div>


                                <!-- Call Number Type -->
                                <div class="box-body" id="divCallNumber" hidden="hidden">
                                    <label>Call Number</label>


                                    <div class="box-body">
                                        <label class="col-sm-3">Classification Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon" >
                                                <i>050a</i>
                                            </div>
                                            <input name="ClassificationNumber" id="ClassificationNumber" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <!-- /.box body -->               
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Item number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon" >
                                                <i>050b</i>
                                            </div>

                                            <input name="ItemNumber" id="ItemNumber" type="text" class="form-control" data-mask">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.box body -->
                                    </div>

                                    <div class="box-body">
                                        <label class="col-sm-3">Publication Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon" >
                                                <i>050c</i>
                                            </div>
                                            <input name="CopyrightDate" class="form-control" id="CopyrightDate">
                                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <!-- /.call number box body -->
                                </div>

                                <!-- /.box body -->
                            </div>
                            <!-- /.col 6 md -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>


                <div class="box">
                    <!--/.Edition-->
                    <div class="box-body">
                        <div class="box-body" id="divEditionStatement" hidden="hidden">
                            <label class="col-sm-2">Edition Statement</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>250a</i>
                                </div>   
                                <input Name="EditionStatement" id="EditionStatement" type="text" class="form-control" data-mask>
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>        
                                <!-- /.input group -->
                            </div>
                            <!-- /.box body -->
                        </div>

                        <div class="box-body" id="divRemainderofEditionStatement" hidden="hidden">
                            <label class="col-sm-2">Remainder of Edition Statement </label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>250b</i>
                                </div>

                                <input name="RemainderofEditionStatement" id="RemainderofEditionStatement" type="text" class="form-control" data-mask>         
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.box body -->
                        </div>
                        <!-- /.subtitle box body -->
                    </div>

                    <!-- /.box-->
                </div>


                <div class="box">
                    <!--/.Title-->
                    <div class="box-body">
                        <label>Title</label> <label p style ="color:red" p style ="size:20000px" id="lblTitle" style="display: none;"></label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i>245a</i>
                            </div>
                            <input name="Title" id="Title" type ="text" class="form-control redph" data-mask>
                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                            </div>

                            <!-- /.input group -->
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!--/.Subtitle-->
                    <div class="box-body">
                        <label>Subtitle</label>


                        <div class="box-body">
                            <label class="col-sm-2">Remainder of the Title</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>245b</i>
                                </div>   
                                <input Name="RemainderoftheTitle" id="RemainderoftheTitle" type="text" class="form-control" data-mask>
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>        

                                <!-- /.input group -->
                            </div>

                            <!-- /.box body -->
                        </div>

                        <div class="box-body">
                            <label class="col-sm-2">Statement of Responsibility</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>245c</i>
                                </div>

                                <input name="StatementofResponsibility" id="StatementofResponsibility" type="text" class="form-control" data-mask>         
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>
                                <!-- /.input group -->
                            </div>


                            <!-- /.box body -->
                        </div>






                        <!-- /.subtitle box body -->
                    </div>


                    <!--/.Abbreviated Title for Non Prints -->
                    <div class="box-body" id="divAbbreviatedTitle" hidden="hidden">
                        <label>Abbreviated Title</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i>210</i>
                            </div>
                            <input name="AbbreviatedTitle" id="AbbreviatedTitle" type ="text" class="form-control" data-mask>
                            <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                            </div>  

                            <!-- /.input group -->
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!--/.End of Abbreviated Title for Non Prints -->

                    <!-- /.box-->
                </div>

                <!-- /.Production for Technical Reports -->
                <div class="box" id="divProduction">

                    <div class="box-body">

                        <label>Production, Distribution and Year Submitted </label>

                        <div class="box-body">
                            <label class="col-sm-2">Address of the Implementing Agency</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>264a</i>
                                </div>   
                                <input Name="AddressofTheImplementingAgency" id="AddressofTheImplementingAgency" type="text" class="form-control" data-mask>
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>       

                                <!-- /.input group -->
                            </div>

                            <!-- /.box body -->
                        </div>

                        <div class="box-body">
                            <label class="col-sm-2">Name of the Implementing Agency</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>264b</i>
                                </div>

                                <input name="NameofImplementingAgency" id="NameofImplementingAgency" type="text" class="form-control" data-mask>         
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>
                                <!-- /.input group -->
                            </div>


                            <!-- /.box body -->
                        </div>

                        <div class="box-body">
                            <label class="col-sm-2">Year of Completion of the Project</label>
                            <div class="input-group">
                                <div class="input-group-addon" >
                                    <i>264c</i>
                                </div>

                                <input name="YearofCompletionofTheProject" id="YearofCompletionofTheProject" type="text" class="form-control" data-mask>         
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>
                                <!-- /.input group -->
                            </div>


                            <!-- /.box body -->
                        </div>




                        <!-- /.box-body -->
                    </div>


                    <!-- /.divProduction -->
                </div>

                <div class="box">
                    <div class="row">
                        <div class="col-md-6">

                            <!--/.Physical Extension -->
                            <div class="box-body">
                                <label>Physical Extension(300a)</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>300a</i>
                                    </div>
                                    <input name="PhysicalExtension" id="PhysicalExtension" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="box-body">
                                <label>Physical Description(300b)</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>300b</i>
                                    </div>
                                    <input name="PhysicalDescription" id="PhysicalDescription" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="box-body">
                                <label>Physical Dimensions(300c)</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>300c</i>
                                    </div>
                                    <input name="PhysicalDimension" id="PhysicalDimension" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="box-body">
                                <label>Accompanying Material</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>300e</i>
                                    </div>
                                    <input name="PhysicalAccompanyingMaterial" id="PhysicalAccompanyingMaterial" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <!--/.Playing Time for Non Prints -->
                            <div class="box-body" id="divPlayingTime" hidden="hidden">
                                <label>Playing Time</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>300$1</i>
                                    </div>
                                    <input name="PlayingTime" id="PlayingTime" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!--/.End of Playing Time for Non Prints -->

                            <!-- /.col 6-->
                        </div>

                        <div class="col-md-6">

                            <!-- Content Type Term -->
                            <div class="box-body">
                                <label>Content Type Term</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>336a</i>
                                    </div>
                                    <select field-type="Select" name="cboContentTypeTerm" id="cboContentTypeTerm" onchange="onContentTypeTerm()" class="form-control select2" style="width: 100%;">
                                        <?php foreach($contenttype as $content): ?>
                                            <option value="<?php echo $content['ContentTypeID']; ?>"><?php echo $content['ContentTypeTerm']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>


                            <!-- Content Type Code -->
                            <div class="box-body">
                                <label>Content Type Code</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>336b</i>
                                    </div>
                                    <select field-type="Select" name="cboContentTypeCode" id="cboContentTypeCode"  class="form-control select2" style="width: 100%;">
                                        <?php foreach($contenttype as $content): ?>
                                            <option value="<?php echo $content['ContentTypeID']; ?>"><?php echo $content['ContentTypeCode']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>


                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- Content Source -->
                            <div class="box-body">
                                <label>Source</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>336$2</i>
                                    </div>
                                    <input name="ContentTypeSource" id="ContentTypeSource" type="text" class="form-control" data-mask>
                                    <!-- /.input group -->
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <!-- /.col 6-->
                        </div>
                        <!-- /.row-->
                    </div>
                    <!-- /.box-->
                </div>

                <div class="box">
                    <div class="row">   
                        <div class="col-md-6">


                            <!-- Media Type Term -->
                            <div class="box-body">
                                <label>Media Type Term</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>337a</i>
                                    </div>
                                    <select field-type="Select" name="cboMediaTypeID" id="cboMediaTypeID" onchange="onMediaTypeID()" class="form-control select2" style="width: 100%;">
                                        <?php foreach($mediatype as $media): ?>
                                            <option value="<?php echo $media['MediaTypeID']; ?>"><?php echo $media['MediaTypeTerm']; ?></option>
                                        <?php endforeach; ?>


                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- Media Type Code -->
                            <div class="box-body">
                                <label>Media Type Code</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>337b</i>
                                    </div>

                                    <select field-type="Select" name="cboMediaTypeCode" id="cboMediaTypeCode" class="form-control select2" style="width: 100%;">
                                        <?php foreach($mediatype as $media): ?>
                                            <option value="<?php echo $media['MediaTypeID']; ?>"><?php echo $media['MediaTypeCode']; ?></option>
                                        <?php endforeach; ?>


                                    </select>

                                    <!-- /.input group -->
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                </div>
                                <!-- /.box body -->
                            </div>

                            <div class="box-body">
                                <label>Source</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>337$2</i>
                                    </div>
                                    <input name="MediaSource" id="MediaSource" type="text" class="form-control" data-mask>
                                    <!-- /.input group -->
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <!-- /.Sound Characteristics for Non Prints -->
                            <div id="divSoundCharacteristics">

                                <br>
                                <br>


                                <div class="box-body">
                                    <label>Type of Recording</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>344a</i>
                                        </div>
                                        <input name="TypeofRecording" id="TypeofRecording" type="text" class="form-control" data-mask>
                                        <!-- /.input group -->
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box-body">
                                    <label>Recording Medium</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>344b</i>
                                        </div>
                                        <input name="RecordingMedium" id="RecordingMedium" type="text" class="form-control" data-mask>
                                        <!-- /.input group -->
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box-body">
                                    <label>Playing Speed</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>344c</i>
                                        </div>
                                        <input name="PlayingSpeed" id="PlayingSpeed" type="text" class="form-control" data-mask>
                                        <!-- /.input group -->
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>


                            </div>

                            <!-- /.End of Sound Characteristics for Non Prints -->

                            <!-- /.col md 6 -->
                        </div>

                        <div class="col-md-6">
                            <!-- Carrier Type Term -->
                            <div class="box-body">
                                <label>Carrier Type Term</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>338a</i>
                                    </div>
                                    <select field-type="Select" name="cboCarrierTypeID" id="cboCarrierTypeID" onchange="onCarrierTypeID()" class="form-control select2" style="width: 100%;">
                                        <?php foreach($carriertype as $carrier): ?>
                                            <option value="<?php echo $carrier['CarrierTypeID']; ?>"><?php echo $carrier['CarrierTypeTerm']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- Carrier Type Code -->
                            <div class="box-body">
                                <label>Carrier Type Code</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>338b</i>
                                    </div>
                                    <select field-type="Select" name="cboCarrierTypeCode" id="cboCarrierTypeCode" class="form-control select2" style="width: 100%;">
                                        <?php foreach($carriertype as $carrier): ?>
                                            <option value="<?php echo $carrier['CarrierTypeID']; ?>"><?php echo $carrier['CarrierTypeCode']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <!-- Carrier Source -->
                            <div class="box-body">
                                <label>Source</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>338$2</i>
                                    </div>
                                    <input name="CarrierSource" id="CarrierSource" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <br>
                            <br>

                            <!-- /.Dates of Publication for Non Prints -->
                            <div class="box-body" id="divDatesofPublication" hidden="hidden">
                                <label>Dates of Publication and/or Sequential Designation </label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>362</i>
                                    </div>
                                    <input name="DatesofPublicationorSequentialDesignation" id="DatesofPublicationorSequentialDesignation" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <!-- /.End of Dates of Publication for Non Prints -->

                            <!-- /.Time/Period of creation for Non Prints -->
                            <div class="box-body" id="divTimePeriodofCreation" hidden="hidden">
                                <label>Time Period of Creation  </label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i>388</i>
                                    </div>
                                    <input name="TimePeriodofCreation" id="TimePeriodofCreation" type="text" class="form-control" data-mask>
                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <!-- /.End Time/Period of creation for Non Prints -->


                            <!-- /.col 6 -->
                        </div>
                        <!-- /.row-->
                    </div>
                    <!-- /.box-->
                </div>

                <!-- /.Series Statement (Series Traced/ Series not Traced) -->
                <div class="box">
                    <div class="form-group">
                        <div class="box-body" >
                            <label id="divSeriesStatementLabel" hidden="hidden">Series Statement </label>

                            <div class="input-group" id="divSeriesStatementID">
                                <div class="input-group-addon" hidden="hidden" >
                                    <i>490</i>
                                </div>

                                <select field-type="Select" name="SeriesStatementID" id="SeriesStatementID" class="form-control select2" style="width: 100%;" >


                                    <option value="1">Series Traced</option>
                                    <option value="0">Series not Traced</option>
                                </select>
                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                </div>
                                <!-- /.input group-->
                            </div>

                            <!-- /.Series Title -->
                            <div class="box-body" id="divSeriesStatement">
                                <label class="col-sm-3">Series Title</label>
                                <div class="input-group">
                                    <div class="input-group-addon" >
                                        <i>490v</i>
                                    </div>


                                    <input name="SeriesStatement" id="SeriesStatement" type="text" class="form-control" data-mask">
                                    <div class="input-group-addon recolor" rel="tooltip" title="">
                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                    </div>

                                    <!-- /.input group -->
                                </div>
                                <!-- /.box body -->
                            </div>

                            <div class="box-body">

                                <div class="box-header with-border">
                                    <div id="divShowAdditionalFields" hidden="hidden">
                                        <label for="chkSeries"> <input type="checkbox" id="chkSeries">Show Additional Fields </label>
                                    </div>


                                    <div id="divSeriesDropdown" style="" class="" >

                                        <div class="box-body" id="divSerieStatement" hidden="hidden">
                                            <label class="col-sm-3">Series Statement</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" >
                                                    <i>490a</i>
                                                </div>


                                                <input name="SeriesStatement" id="SeriesStatement" type="text" class="form-control" data-mask">
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 12px;"></i>
                                                </div>

                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.box body -->
                                        </div>  

                                        <!-- /.Volume Sequential Designation -->
                                        <div class="box-body" id="divVolumeSequentialDesignation">
                                            <label class="col-sm-3">Volume / Sequential Designation</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" >
                                                    <i>490v</i>
                                                </div>


                                                <input name="VolumeSequentialDesignation" id="VolumeSequentialDesignation" type="text" class="form-control" data-mask">
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>

                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.box body -->
                                        </div>

                                        <!-- /.General Note -->
                                        <div class="box-body" hidden="hidden" id="divGeneralNote">
                                            <label class="col-sm-3">General Note</label>
                                            <div class="input-group" >
                                                <div class="input-group-addon" >
                                                    <i>500a</i>
                                                </div>
                                                <input name="GeneralNote" id="GeneralNote" type="text" class="form-control" data-mask">
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.box body -->
                                        </div>


                                        <!-- /.Production for Technical Reports -->
                                        <div class="box" id="divRestricitononAccessNote">

                                            <div class="box-body">

                                                <label>Restrictions on Access Note</label>

                                                <div class="box-body">
                                                    <label class="col-sm-2">Terms Governing Access</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon" >
                                                            <i>506a</i>
                                                        </div>   
                                                        <input Name="TermsGoverningAccess" id="TermsGoverningAccess" type="text" class="form-control" data-mask>
                                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                        </div>        

                                                        <!-- /.input group -->
                                                    </div>

                                                    <!-- /.box body -->
                                                </div>

                                                <!-- /.Jurisdiction Name -->
                                                <div class="box-body">
                                                    <label class="col-sm-2">Jurisdiction Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon" >
                                                            <i>506b</i>
                                                        </div>

                                                        <input name="JurisdictionName" id="JurisdictionName" type="text" class="form-control" data-mask>         
                                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                        </div> 
                                                        <!-- /.input group -->
                                                    </div>


                                                    <!-- /.box body -->
                                                </div>

                                                <!-- /.Physical Access Provisions -->
                                                <div class="box-body">
                                                    <label class="col-sm-2">Physical Access Provisions</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon" >
                                                            <i>506c</i>
                                                        </div>

                                                        <input name="PhysicalAccessProvisions" id="PhysicalAccessProvisions" type="text" class="form-control" data-mask>         
                                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                        </div> 
                                                        <!-- /.input group -->
                                                    </div>


                                                    <!-- /.box body -->
                                                </div>




                                                <!-- /.box-body -->
                                            </div>


                                            <!-- /.divRestrictionsOnAccessNote -->
                                        </div>


                                        <div class="box-body" id="divTypesofReportandPeriodCoveredNote">

                                            <label>Types of Report and Period Covered Note</label>

                                            <div class="box-body">
                                                <label class="col-sm-2">Type of Report</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" >
                                                        <i>513a</i>
                                                    </div>

                                                    <input name="TypeofReport" id="TypeofReport" type="text" class="form-control" data-mask>         
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>


                                                <!-- /.box body -->
                                            </div>

                                            <div class="box-body">
                                                <label class="col-sm-2">Period Covered</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" >
                                                        <i>513b</i>
                                                    </div>

                                                    <input name="PeriodCovered" id="PeriodCovered" type="text" class="form-control" data-mask>         
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>


                                                <!-- /.box body -->
                                            </div>

                                        </div>


                                        <div class="box-body" id="divBibliography">
                                            <label class="col-sm-3">Bibliography</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" >
                                                    <i>504a</i>
                                                </div>

                                                <textarea name="BibliographicNote" id="BibliographicNote" class="form-control" rows="5"></textarea>
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>

                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.box body -->
                                        </div>

                                        <div class="box-body" id="divFormattedContents">
                                            <label class="col-sm-3">Formatted Contents</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" >
                                                    <i>505a</i>
                                                </div>

                                                <input name="FormattedContents" id="FormattedContents" type="text" class="form-control" data-mask"> 
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.box body -->
                                        </div>

                                        <!-- /.div drop down-->
                                    </div>

                                    <!-- /.collapsible box body-->
                                </div>
                                <!-- /.box-->
                            </div>

                            <div class="box box-default">

                                <div class="box-header with-border">


                                    <!-- /.Dissertation Note for Theses/Investigatory Projects-->
                                    <div id="divDissertation" hidden="hidden">
                                        <label for="chkDissertationNote">
                                            <input input type="checkbox" id="chkDissertationNote" />
                                            Dissertation Note 
                                        </label>
                                    </div>

                                    <div id="divDissertationNote" style="display: none;" >
                                        <div class="box-body" id="">

                                            <label> Dissertation Note  </label>

                                            <div class="input-group" >
                                                <div class="input-group-addon">
                                                    <i>502a</i>
                                                </div>
                                                <input name= "DissertationNote" type="text" class ="form-control" id="DissertationNote" />
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                            </div>

                                            <!-- /.box body -->
                                        </div>

                                        <div class="box-body" id="divDegreeType">

                                            <label> Degree Type </label>

                                            <div class="input-group" >
                                                <div class="input-group-addon">
                                                    <i>502b</i>
                                                </div>
                                                <input name= "DegreeType" type="text" class ="form-control" id="DegreeType" />
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                            </div>



                                            <!-- /.box body -->
                                        </div>



                                        <div class="box-body" id="divNameofGrantingInstitution">

                                            <label>Name of Granting Institution </label>

                                            <div class="input-group" >
                                                <div class="input-group-addon">
                                                    <i>502c</i>
                                                </div>
                                                <input name= "NameofGrantingInstitution" type="text" class ="form-control" id="NameofGrantingInstitution" />
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                            </div>



                                            <!-- /.box body -->
                                        </div>

                                        <div class="box-body" id="divYearDegreeGranted">

                                            <label>Year Degree Granted </label>

                                            <div class="input-group" >
                                                <div class="input-group-addon">
                                                    <i>502d</i>
                                                </div>
                                                <input name= "YearDegreeGranted" type="text" class ="form-control" id="YearDegreeGranted" />
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                            </div>



                                            <!-- /.box body -->
                                        </div>




                                        <!-- /.div drop down -->  
                                    </div>

                                    <!-- /.End of Dissertation Note -->
                                    <!-- /.Citation/ References Note for Non Prints -->

                                    <div id="divCitationReferencesNote" hidden="hidden">
                                        <div class="box-body">
                                            <label>Citation / References Note</label>


                                            <div class="box-body">
                                                <label class="col-sm-2">Name of Source</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" >
                                                        <i>510a</i>
                                                    </div>   
                                                    <input Name="NameofSource" id="NameofSource" type="text" class="form-control" data-mask>
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>       

                                                    <!-- /.input group -->
                                                </div>

                                                <!-- /.box body -->
                                            </div>

                                            <div class="box-body">
                                                <label class="col-sm-2">Uniform Resource Identifier</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" >
                                                        <i>510u</i>
                                                    </div>

                                                    <input name="UniformResourceIdentifier" id="UniformResourceIdentifier" type="text" class="form-control" data-mask>         
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div> 
                                                    <!-- /.input group -->
                                                </div>


                                                <!-- /.box body -->
                                            </div>




                                            <!-- /.Citation/ References Note box body -->
                                        </div>

                                    </div>

                                    <!-- /.End Citation/ References Note for Non Prints -->

                                    <!-- /.summary -->
                                </div>
                                <!-- /.box default--> 
                            </div>

                            <div class="box box-default">

                                <div class="box-header with-border">
                                    <label for="chkSummary">
                                        <input type="checkbox" id="chkSummary" />
                                        Summary
                                    </label>


                                    <div id="divScopeandContent" hidden="hidden">
                                        <div class="box-body">

                                            <label> Scope and Content: </label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i>520a</i>
                                                </div>
                                                <input name= "ScopeandContent" type="text" class ="form-control" id="ScopeandContent" />
                                                <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                    <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>
                                            </div>

                                            <!-- /.box body -->
                                        </div>


                                        <div class="box-body pad">
                                            <label class="col-sm-3">Summary</label>
                                            <div class="input-group">


                                                <form>    


                                                    <textarea id="Summary"  name="Summary" class="Summary"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="abc">   </textarea>



                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>


                                                </form>
                                                <!-- /.input group -->
                                            </div>


                                            <!-- /.box body -->
                                        </div> 

                                        <!-- /.div drop down -->  
                                    </div>
                                    <!-- /.summary -->
                                </div>
                                <!-- /.box default--> 
                            </div>
                            <!-- /.form-group-->


                            <div class="box box-default">
                                <div class="box-header with-border">


                                    <div id="divlblchkAdditonalPhysicalForm">
                                        <label for="chkAdditionalPhysicalForm">
                                            <input type="checkbox" id="chkAdditionalPhysicalForm" />
                                            Additional Physical Form Available Note
                                        </label>

                                    </div>


                                    <!-- <div id="divchkAdditonalPhysicalForm" hidden="hidden"> -->




                                        <div class="box-body">
                                            <div id="divAdditionalPhysicalForm"  hidden="hidden">
                                                <label> Additional Physical Form Available Note: </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i>530a</i>
                                                    </div>
                                                    <input name="AdditionalPhysicalFormAvailableNote" type="text" class ="form-control" id="AdditionalPhysicalFormAvailableNote" />
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>
                                                </div>




                                                <label> Availability Source: </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i>530b</i>
                                                    </div>
                                                    <input name="AvailabilitySource" type="text" class ="form-control" id="AvailabilitySource" />
                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>
                                                </div>


                                                <label> Availability Conditions: </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i>530c</i>
                                                    </div>
                                                    <input name="AvailabilityConditions" type="text" class ="form-control" id="AvailabilityConditions" />

                                                    <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                        <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                    </div>

                                                </div>




                                                <!-- /.div -->
                                            </div>



                                            <!-- /.box body -->
                                        </div>

                                        <!-- /.id-->
                                    <!-- </div> -->

                                    <!-- /.box header with border-->
                                </div>

                                <!-- /.box- default-->
                            </div>

                        </div>


                        <div class="box box-default">
                            <div class="box-header with-border">


                                <div class="box-body">



                                    <label>Status: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-check-square"></i>
                                        </div>
                                        <select field-type="Select" name="PublicationStatus" id="PublicationStatus" class="form-control select2" style="width: 25%;">


                                            <option value="0">Unprocess</option>
                                            <option value="1">On Process</option>


                                        </select>




                                        <!-- /.All fields below are for tblindices these are hidden in forms -->
                                        <input name="indexID" type="hidden"  class ="form-control" id="indexID"  />
                                        <input name="Author" type="hidden" class ="form-control" id="Author" />
                                        <input name="Publisher" type="hidden" class ="form-control" id="Publisher"/>
                                        <input name="PublicationYear" type="hidden" class ="form-control" id="PublicationYear"/>
                                        <input name="Subjects" type="hidden" class ="form-control" id="Subjects"/>
                                        <input name="Publication" type="hidden" class ="form-control" id="Publication"/>



                                    </div>


                                    <!-- /.div -->
                                </div>



                                <!-- /.box body -->


                                <div class="form-group pull-right">


                                    <button type="button" onclick="save_record()" id="btnSubmit" class="btn btn-primary">Save</button>
                                    <button action="cancel" onclick="clear_fields()" type="button" id="btnClear"class="btn btn-default" data-dismiss="modal">Clear</button>
                                    <button action="cancel" onclick="delete_records()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                                </div>

                            </div>

                            <!-- /.box header with border-->
                        </div>

                        <!-- /.box- default-->
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
        </div>
    </div>
    <!-- /.content -->

    <div class="modal fade bs-example-modal-lg" id="mdlAuthor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
            </div>
        </div>
    </div>

<!-- </form> -->
</div>
<!-- /.content-wrapper -->







<!-- SCRIPT -->
<script type="text/javascript">
    //Loading DataTable per material type
    $(document).ready(function() {
        //Datatabel for uncatalog
        if ($('#material').val() == -1) 
        { 
            $('#divUncatalog').show();
            $('#tblUncatalog').show();
            $('#tblUncatalog').DataTable({
                "pageLength": 10,
                "scrollX": true,
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/holdings_uncatalog_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Holdings'
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
                    filename: 'Holdings'
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
                    filename: 'Holdings'
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
                    filename: 'Holdings'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": true
                }
                ],

                "order": [
                [5, "desc" ]
                ]
            });
        }
        //Datatable for catalog
        else if ($('#material').val() == 0) 
        { 
            $('#divHoldings').show();
            $('#tblHoldings').show();
            $('#tblHoldings').DataTable({
                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                "fixedColumns":   {
                    "leftColumns": 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/holdings_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                        title: 'Holdings'
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
                        filename: 'Holdings'
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
                        filename: 'Holdings'
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
                        filename: 'Holdings'
                    },  
                    {
                        extend: 'print',
                        exportOptions: 
                        {
                            columns: [':visible :not(:last-child)']
                        },
                        text:      '',
                        className:'opt_icon opt_icon5',
                        titleAttr: 'Print'
                    }
                ],
                "columnDefs": 
                [
                    {
                        "targets": [3,4,5],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [8,9,10,12,-1],
                        "orderable": false
                    }
                ]
            });
        }
        //Datatable for Books
        else if ($('#material').val() == 1)
        {
            $('#divBooks').show();
            $('#tblBooks').show();
            $('#tblBooks').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/books_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Books'
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
                    filename: 'Books'
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
                    filename: 'Books'
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
                    filename: 'Books'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        //Datatable for Serials
        else if ($('#material').val() == 2)
        { 
            $('#divSerials').show();
            $('#tblSerials').show();
            $('#tblSerials').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/serials_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Serials'
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
                    filename: 'Serials'
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
                    filename: 'Serials'
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
                    filename: 'Serials'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        //Datatable for Theses
        else if ($('#material').val() == 3)
        { 
            $('#divTheses').show();
            $('#tblTheses').show();
            $('#tblTheses').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": {
                    url : "<?php echo site_url("Holdings_controller/theses_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
                "buttons": [{
                    extend: 'copy',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    titleAttr: 'Copy',
                    className:'opt_icon opt_icon1c',
                    title: 'Theses/Dissertations'
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
                    filename: 'Theses/Dissertations'
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
                    filename: 'Theses/Dissertations'
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
                    filename: 'Theses/Dissertations'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        else if ($('#material').val() == 4)
        { 
            //Datatable for Non Prints
            $('#divNonPrints').show();
            $('#tblNonPrints').show();
            $('#tblNonPrints').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/nonprints_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        else if ($('#material').val() == 5)
        { 
            //Datatable for Vertical Files
            $('#divVerticalFiles').show();
            $('#tblVerticalFiles').show();
            $('#tblVerticalFiles').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/verticalfiles_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Vertical Files'
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
                    filename: 'Vertical Files'
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
                    filename: 'Vertical Files'
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
                    filename: 'Vertical Files'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        else if ($('#material').val() == 6)
        { 
            //Datatable for Investigatory Projects
            $('#divInvestigatoryProjects').show();
            $('#tblInvestigatoryProjects').show();
            $('#tblInvestigatoryProjects').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/investigatoryprojects_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        else if ($('#material').val() == 7)
        { 
            //Datatable for Technical Reports
            $('#divTechnicalReports').show();
            $('#tblTechnicalReports').show();
            $('#tblTechnicalReports').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/technicalreports_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
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
                    filename: 'Nonprints'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            });
        }
        else if ($('#material').val() == 8)
        { 
            //Datatable for Reprints
            $('#divReprints').show();
            $('#tblReprints').show();
            $('#tblReprints').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         true,
                fixedColumns:   {
                    leftColumns: 3

                },
                "ajax": 
                {
                    url : "<?php echo site_url("holdings_controller/reprints_datatable") ?>",
                    type : 'POST'
                },  
                "dom": 'Bfrtip',
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
                    title: 'Reprints'
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
                    filename: 'Reprints'
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
                    filename: 'Reprints'
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
                    filename: 'Reprints'
                },  
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [':visible :not(:last-child)']
                    },
                    text:      '',
                    className:'opt_icon opt_icon5',
                    titleAttr: 'Print'
                }
                ],


                "columnDefs": 
                [
                {
                    "targets": [-1],
                    "orderable": false
                }
                ]
            })
        }

        $("input").change(function()
        {
            $(this).parent().parent().removeClass('has-error');
        });
    });

    $(document).ready(function()
    {
        $("#collapseExample").on("hide.bs.collapse", function(){
            $("#divcollapse").html('<i class="fa fa-plus"></i>');
        });
        $("#collapseExample").on("show.bs.collapse", function(){
            $("#divcollapse").html('<i class="fa fa-minus"></i>');
        });
    });

    //Load record to edit
    function edit_records(id)
    {
        scroll_top();

        if(!$( "#form" ).is( ":visible" ))
            $('#divcollapse').click();

        $.ajax({  
            url:"<?php echo site_url("holdings_controller/holdings_edit")?>/"+id,
            method:"POST",  
            data:{id:id},  
            dataType:"json",  
            success:function(data)
            { 
                //Codes below are used to hide and unhide divs. If fields within the divs are not empty it will show up and vice versa
                if(data.VolumeSequentialDesignation!="" || data.GeneralNote!="" || data.BibliographicNote!="" || data.FormattedContents!="")
                {
                    $('#chkSeries').prop('checked', true);
                    $('#divSeriesDropdown').show('1000');
                }
                else
                {
                    $('#chkSeries').prop('checked', false);
                    $('#divSeriesDropdown').hide();
                }



                if(data.ScopeandContent!="" || data.Summary!="")
                {
                    $('#chkSummary').prop('checked', true);
                    $('#divScopeandContent').show('1000');
                }
                else
                {

                    $('#chkSummary').prop('checked', false);
                    $('#divScopeandContent').hide();
                }

                if(data.AdditionalPhysicalFormAvailableNote!="" || data.AvailabilitySource!="" || data.AvailabilityConditions!= "" )
                {
                    $('#chkAdditionalPhysicalForm').prop('checked', true);
                    $('#divAdditionalPhysicalForm').show('1000');
                }
                else
                {
                    $('#chkAdditionalPhysicalForm').prop('checked', false);
                    $('#divAdditionalPhysicalForm').hide();
                }

                if(data.DissertationNote!="" || data.DegreeType!="" || data.NameofGrantingInstitution!= "" || data.YearDegreeGranted!= "" )
                {
                    $('#chkDissertationNote').prop('checked', true);
                    $('#divDissertationNote').show('1000');
                }
                else
                {
                    $('#chkDissertationNote').prop('checked', false);
                    $('#divDissertationNote').hide();
                }

                //loading data from controller to  each fields
                $('#HoldingsID').val(data.HoldingsID);  

                $('#ClassificationNumber').val(data.ClassificationNumber);
                $('#ItemNumber').val(data.ItemNumber);
                $('#CopyrightDate').val(data.CopyrightDate);

                $('#EditionStatement').val(data.EditionStatement);
                $('#RemainderofEditionStatement').val(data.RemainderofEditionStatement);  

                $('#Title').val(data.Title);
                $('#RemainderoftheTitle').val(data.RemainderoftheTitle);
                $('#StatementofResponsibility').val(data.StatementofResponsibility);

                $('#TypeofRecording').val(data.TypeofRecording);
                $('#RecordingMedium').val(data.RecordingMedium);
                $('#PlayingSpeed').val(data.PlayingSpeed);

                $('#AbbreviatedTitle').val(data.AbbreviatedTitle);

                $('#PhysicalExtension').val(data.PhysicalExtension);
                $('#PhysicalDescription').val(data.PhysicalDescription);
                $('#PhysicalDimension').val(data.PhysicalDimension);
                $('#PhysicalAccompanyingMaterial').val(data.PhysicalAccompanyingMaterial);
                $('#PlayingTime').val(data.PlayingTime);

                $('#CatalogNumber').val(data.CatalogNumber);
                $('#CatalogDate').val(data.CatalogDate);
                $('#CatalogSource').val(data.CatalogSource);

                $('#cboMaterialType').val(data.cboMaterialType).change();
                $('#cboBroadClassification').val(data.cboBroadClassification).change();

                $('#ISBN').val(data.ISBN);
                $('#ISSN').val(data.ISSN);  
                $('#cboLanguageID').val(data.cboLanguageID).change();

                $('#cboContentTypeTerm').val(data.cboContentTypeTerm).change();
                $('#cboContentTypeCode').val(data.cboContentTypeCode).change();
                $('#ContentTypeSource').val(data.ContentTypeSource);

                $('#cboMediaTypeID').val(data.cboMediaTypeID).change();  
                $('#cboMediaTypeCode').val(data.cboMediaTypeCode).change();
                $('#MediaSource').val(data.MediaSource);
                $('#cboCarrierTypeID').val(data.cboCarrierTypeID).change();
                $('#cboCarrierTypeCode').val(data.cboCarrierTypeCode).change();
                $('#CarrierSource').val(data.CarrierSource);  

                $('#DatesofPublication').val(data.DatesofPublication);
                $('#TimePeriodofCreation').val(data.TimePeriodofCreation);  

                $('#SeriesStatementID').val(data.SeriesStatementID);
                $('#SeriesStatement').val(data.SeriesStatement);
                $('#VolumeSequentialDesignation').val(data.VolumeSequentialDesignation);
                $('#DatesofPublicationorSequentialDesignation').val(data.VolumeSequentialDesignation);
                $('#GeneralNote').val(data.GeneralNote);  
                $('#BibliographicNote').val(data.BibliographicNote);
                $('#FormattedContents').val(data.FormattedContents);

                //Dissertation note for Theses/Investigatory Projects
                $('#DissertationNote').val(data.DissertationNote);
                $('#DegreeType').val(data.DegreeType);
                $('#NameofGrantingInstitution').val(data.NameofGrantingInstitution);
                $('#YearDegreeGranted').val(data.YearDegreeGranted);

                //Citation / References Note for Non prints
                $('#NameofSource').val(data.NameofSource);
                $('#UniformResourceIdentifier').val(data.UniformResourceIdentifier);

                //For Technical Reports
                $('#SpecialCodedDates').val(data.SpecialCodedDates);
                $('#AddressofTheImplementingAgency').val(data.AddressofTheImplementingAgency);
                $('#NameofImplementingAgency').val(data.NameofImplementingAgency);
                $('#YearofCompletionofTheProject').val(data.YearofCompletionofTheProject);
                $('#TermsGoverningAccess').val(data.TermsGoverningAccess);
                $('#JurisdictionName').val(data.JurisdictionName);
                $('#PhysicalAccessProvisions').val(data.PhysicalAccessProvisions);
                $('#TypeofReport').val(data.TypeofReport);
                $('#PeriodCovered').val(data.PeriodCovered);

                $('#ScopeandContent').val(data.ScopeandContent);
                $('#Summary').val(data.Summary);

                $('#AdditionalPhysicalFormAvailableNote').val(data.AdditionalPhysicalFormAvailableNote);
                $('#AvailabilitySource').val(data.AvailabilitySource);
                $('#AvailabilityConditions').val(data.AvailabilityConditions);

                $('#PublicationStatus').val(data.PublicationStatus).change();

                $('#indexID').val(data.indexID);
                $('#Author').val(data.Author);
                $('#Publisher').val(data.Publisher);
                $('#PublicationYear').val(data.PublicationYear);
                $('#Subjects').val(data.Subjects);
                $('#Publication').val(data.PublicationStatus);
                $('#Language').val(data.Language);

                //Important for Text Editor
                CKEDITOR.replace( 'Summary' );
                // clearconsole();
            }
        });

        //important for reloading ckeditor
        if (typeof(CKEDITOR) != "undefined")
        {
            for(name in CKEDITOR.instances){
                CKEDITOR.instances[name].destroy()
            }
        }
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load authors that has association in a certain holdings ID while title is used for display purposes in Author view
    function view_author(id,title)
    {
        $.ajax({
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            type: "POST",
            data:{id:id, title:title}, 
            dataType: "JSON",
            success:function(data)  
            {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/viewauthor');?>";
            }  
        });
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load publications that has association in a certain holdings ID while title is used for display purposes in Publication view
    function view_publications(id,title)
    {
        $.ajax(
        {  
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            method:"POST",  
            data:{id:id, title:title},
            dataType:"json", 
            success:function(data)  
            {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/publicationsindex');?>";
            }    
        });
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load holdingscopy that has association in a certain holdings ID while title is used for display purposes in Holdingscopy view
    function view_holdingscopy(id,title)
    {
        $.ajax({  
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            method:"POST",  
            data:{id:id, title:title},
            dataType:"json", 
            success:function(data) {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/holdingscopyindex');?>";
            }

        });
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load subjects that has association in a certain holdings ID while title is used for display purposes in subjects view
    function view_subjects(id,title)
    {
        $.ajax({  
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            method:"POST",  
            data:{id:id, title:title},
            dataType:"json", 
            success:function(data) {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/subjectsindex');?>";
            }

        });
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load fulltext that has association in a certain holdings ID while title is used for display purposes in subjects view
    function view_fulltext(id,title)
    {
        $.ajax({  
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            method:"POST",  
            data:{id:id, title:title},
            dataType:"json", 
            success:function(data) {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/multimediaindex');?>";
            }
        });
    }

    //used to pass holdings id and title in setholdingsid function in controller, HoldingsID is used to load frontpage that has association in a certain holdings ID while title is used for display purposes in frontapage
    function view_frontpage(id,title)
    {
        $.ajax({  
            url:"<?php echo base_url("holdings_controller/setholdingsid")?>", 
            method:"POST",  
            data:{id:id, title:title},
            dataType:"json", 
            success:function(data) {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/frontpageindex');?>";
            }
        });
    }

    //used to pass acquisition id and title in setholdingsid function in controller, AcquisitionsID is used to load frontpage of holdingscopy per serial material that has association in a certain AcquisitionsID while title is used for display purposes in frontpage for holdingscopy view
    function view_frontpage_holdingscopy(AcquiID,title)
    {
        $.ajax({  
            url:"<?php echo base_url("holdings_controller/setacquisitionid")?>", 
            method:"POST",  
            data:{AcquiID:AcquiID, title:title},
            dataType:"json", 
            success:function(data) {
                if(data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/holdingscopyfrontpageindexforserials');?>";
            }
        });
    }

    //used to save records in controller goes to create function in holdings_controller
    function save_record()
    { 
        if ($('#HoldingsID').val() != "") 
        {
            //important for text area
            for(var instanceName in CKEDITOR.instances)
                CKEDITOR.instances[instanceName].updateElement();

            $.ajax({
                url:"<?php echo site_url("holdings_controller/create")?>", 
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",  
                success:function(data){
                    if(data.status)
                    {
                        //codes below are used to display certain datatable in holdings view.
                        if ($('#material').val() == -1) 
                            $('#tblUncatalog').DataTable().ajax.reload(null, false);
                        else if ($('#material').val() == 0)
                            $('#tblHoldings').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 1)
                            $('#tblBooks').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 2)
                            $('#tblSerials').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 3)
                            $('#tblTheses').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 4)
                            $('#tblNonPrints').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 5)
                            $('#tblVerticalFiles').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 6)
                            $('#tblInvestigatoryProjects').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 7)
                            $('#tblTechnicalReports').DataTable().ajax.reload(null, false); 
                        else if ($('#material').val() == 8)
                            $('#tblReprints').DataTable().ajax.reload(null, false); 

                        toastr.success("Record saved successfully.");
                        scroll_top();
                        clear_fields();
                        $('input').parent().parent().removeClass('has-error');
                        ckedit();
                    }
                    else  
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
                            data.inputerror[i] == "cboLanguageID" ? toastr.error(data.error_string[i]) : null;
                        }

                        toastr.error("Please fill up all required fields.");
                        scroll_top();
                    }
                }
            });
        }
        else 
        {
            toastr.error("Please select a record");
            scroll_top();
        }
    }

    function delete_records()
    {
        if(confirm('Are you sure you want to delete this record?'))
        {
            var id = $('#HoldingsID').val();
            $.ajax(
            {
                data:"id="+id,
                url : "<?php echo site_url('holdings_controller/delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    toastr.success("Record deleted successfully.");
                }
            });
        }
    }

    //Clear fields
    function clear_fields()
    {
        $('#form')[0].reset();
        $('#HoldingsID').val('');

        $('#cboMaterialType').val('0').change();
        $('#cboBroadClassification').val('0').change();
        $('#cboLanguageID').val('0').change();
        $('#cboContentTypeTerm').val('0').change();
        $('#cboContentTypeCode').val('0').change();
        $('#cboMediaTypeID').val('0').change();
        $('#cboMediaTypeCode').val('0').change();
        $('#cboCarrierTypeID').val('0').change();
        $('#cboCarrierTypeCode').val('0').change();
        CKEDITOR.instances.Summary.setData('');

        ckedit();

        //codes below are used to refresh datatables.
        if ($('#material').val() == -1)
            $('#tblUncatalog').DataTable().ajax.reload(null, false);
        else if ($('#material').val() == 0)
            $('#tblHoldings').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 1)
            $('#tblBooks').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 2)
            $('#tblSerials').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 3)
            $('#tblTheses').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 4)
            $('#tblNonPrints').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 5)
            $('#tblVerticalFiles').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 6)
            $('#tblInvestigatoryProjects').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 7)
            $('#tblTechnicalReports').DataTable().ajax.reload(null, false); 
        else if ($('#material').val() == 8)
            $('#tblReprints').DataTable().ajax.reload(null, false); 

        scroll_top();
    }

    function ckedit()
    {
        CKEDITOR.instances.Summary.destroy(false);
    }

    //Function to Scroll top
    function scroll_top()
    {
        $('html,body').animate(
        {
            scrollTop: $(".entry").offset().top
        },'slow');

    }

    $(function() 
    {
        $("#chkSeries").click(function() 
        {
            if ($(this).is(":checked"))
                $("#divSeriesDropdown").show('');
            else
                $("#divSeriesDropdown").hide('');
        })

        $("#chkSummary").click(function() 
        {
            if ($(this).is(":checked"))
                $("#divScopeandContent").show('');
            else
                $("#divScopeandContent").hide('');
        })

        $("#chkDissertationNote").click(function() 
        {
            if ($(this).is(":checked"))
                $("#divDissertationNote").show('');
            else
                $("#divDissertationNote").hide('');
        })

        $("#chkAdditionalPhysicalForm").click(function () 
        {
            if ($(this).is(":checked"))
                $("#divAdditionalPhysicalForm").show('');
            else
                $("#divAdditionalPhysicalForm").hide('');
        })
    });

    function onMaterialTypeChange()
    {
        //hide and show for book 
        if($('#cboMaterialType').val() == 1)
        {
            $('#divISBN').show('');
            $('#divISSN').hide('');

            $('#divSpecialCodedDates').hide('');
            $('#divCallNumber').show('');

            $('#divEditionStatement').show('');
            $('#divRemainderofEditionStatement').show('');
            $('#divProduction').hide('');

            $('#divSeriesStatementLabel').show('');
            $('#divSeriesStatementID').show('');
            $('#divSeriesStatement').show('');
            $('#chkSeries').show('');

            $('#divShowAdditionalFields').show('');

            $('#divVolumeSequentialDesignation').show('');
            $('#divGeneralNote').show('');
            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');
            $('#divBibliography').show('');
            $('#divFormattedContents').show('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');
            $('#divDatesofPublication').hide('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').hide('');

            $('#divchkAdditonalPhysicalForm').show('');
            $('#divlblchkAdditonalPhysicalForm').show('');


            $('#div').hide('');
            $('#ISSN').val('');
        }
        //hide and show for serials
        else if($('#cboMaterialType').val() == 2)
        {
            $('#divISBN').hide('');
            $('#divISSN').show('');
            $('#ISBN').val('');
            $('#divSpecialCodedDates').hide('');

            $('#divCallNumber').show('');

            $('#divEditionStatement').show('');
            $('#divRemainderofEditionStatement').show('');
            $('#divProduction').hide('');

            $('#divSeriesStatementLabel').show('');
            $('#divSeriesStatementID').show('');
            $('#divSeriesStatement').show('');
            $('#chkSeries').show('');

            $('#divShowAdditionalFields').show('');

            $('#divVolumeSequentialDesignation').show('');
            $('#divGeneralNote').show('');
            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');

            $('#divBibliography').show('');
            $('#divFormattedContents').show('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');

            $('#divDatesofPublication').hide('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').hide('');

            $('#divchkAdditonalPhysicalForm').show('');
            $('#divlblchkAdditonalPhysicalForm').show('');
        }
        //hide and show for theses/dissertaions and investigatory projects
        else if($('#cboMaterialType').val() == 3 || $('#cboMaterialType').val() == 6 )
        {
            $('#divISBN').hide('');
            $('#divISSN').hide('');
            $('#divSpecialCodedDates').hide('');

            $('#divCallNumber').show('');

            $('#divEditionStatement').hide('');
            $('#divRemainderofEditionStatement').hide('');
            $('#divProduction').hide('');

            $('#divSeriesStatementLabel').hide('');
            $('#divSeriesStatementID').hide('');
            $('#divSeriesStatement').hide('');
            $('#chkSeries').hide('');
            $('#divShowAdditionalFields').hide('');

            $('#divVolumeSequentialDesignation').hide('');
            $('#divGeneralNote').show('');
            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');

            $('#divBibliography').hide('');
            $('#divFormattedContents').hide('');

            $('#divDissertation').show('');

            $('#divDegreeType').show('');
            $('#divNameofGrantingInstitution').show('');
            $('#divYearDegreeGranted').show('');


            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');

            $('#divDatesofPublication').hide('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').hide('');

            $('#divchkAdditonalPhysicalForm').show('');
            $('#divlblchkAdditonalPhysicalForm').show('');
        }
        //hide and show for non prints
        else if($('#cboMaterialType').val() == 4)
        {
            $('#divISBN').show('');
            $('#divISSN').show('');
            $('#divSpecialCodedDates').hide('');

            $('#divCallNumber').show('');

            $('#divEditionStatement').show('');
            $('#divRemainderofEditionStatement').show('');

            $('#divProduction').hide('');

            $('#divSeriesStatementLabel').show('');
            $('#divSeriesStatementID').show('');
            $('#divSeriesStatement').show('');
            $('#chkSeries').show('');
            $('#divShowAdditionalFields').show('');

            $('#divVolumeSequentialDesignation').show('');
            $('#divGeneralNote').show('');

            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');


            $('#divBibliography').show('');
            $('#divFormattedContents').show('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').show('');
            $('#divAbbreviatedTitle').show('');
            $('#divSoundCharacteristics').show('');

            $('#divDatesofPublication').show('');
            $('#divTimePeriodofCreation').show('');
            $('#divCitationReferencesNote').show('');

            $('#divchkAdditonalPhysicalForm').show('');
            $('#divlblchkAdditonalPhysicalForm').show('');
        }
        //hide and show for vertical files
        else if($('#cboMaterialType').val() == 5)
        {
            $('#divISBN').show('');
            $('#divISSN').hide('');
            $('#divSpecialCodedDates').hide('');

            $('#divCallNumber').hide('');

            $('#divEditionStatement').show('');
            $('#divRemainderofEditionStatement').show('');

            $('#divProduction').hide('');

            $('#divSeriesStatementLabel').show('');
            $('#divSeriesStatementID').show('');
            $('#divSeriesStatement').show('');
            $('#chkSeries').show('');

            $('#divShowAdditionalFields').show('');

            $('#divVolumeSequentialDesignation').show('');

            $('#divGeneralNote').show('');

            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');


            $('#divBibliography').show('');
            $('#divFormattedContents').show('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');
            $('#divDatesofPublication').hide('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').hide('');

            $('#divlblchkAdditonalPhysicalForm').hide('');
            $('#divchkAdditonalPhysicalForm').hide('');


            $('#div').hide('');


            $('#ISSN').val('');
        }
        //hide and show for technical reports
        else if($('#cboMaterialType').val() == 7)
        {
            $('#divISBN').hide('');
            $('#divISSN').hide('');
            $('#divSpecialCodedDates').show('');

            $('#divCallNumber').show('');

            $('#divEditionStatement').hide('');
            $('#divRemainderofEditionStatement').hide('');
            $('#divProduction').show('');

            $('#divSeriesStatementLabel').hide('');
            $('#divSeriesStatementID').hide('');
            $('#divSeriesStatement').hide('');
            $('#chkSeries').show('');

            $('#divShowAdditionalFields').hide('');
            $('#divVolumeSequentialDesignation').hide('');
            $('#divGeneralNote').show('');

            $('#divRestricitononAccessNote').show('');
            $('#divTypesofReportandPeriodCoveredNote').show('');

            $('#divBibliography').hide('');
            $('#divFormattedContents').hide('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');
            $('#divDatesofPublication').hide('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').hide('');

            $('#divlblchkAdditonalPhysicalForm').hide('');
            $('#divchkAdditonalPhysicalForm').hide('');


            $('#div').hide('');


            $('#ISSN').val('');
        }
        //hide and show for reprints
        else if($('#cboMaterialType').val() == 8)
        {
            $('#divISBN').hide('');
            $('#divISSN').hide('');
            $('#divSpecialCodedDates').hide('');

            $('#divCallNumber').show('');

            $('#divEditionStatement').hide('');
            $('#divRemainderofEditionStatement').hide('');
            $('#divProduction').show('');

            $('#divSeriesStatementLabel').show('');
            $('#divSeriesStatementID').show('');
            $('#divSeriesStatement').show('');
            $('#chkSeries').show('');

            $('#divShowAdditionalFields').show('');

            $('#divVolumeSequentialDesignation').hide('');
            $('#divGeneralNote').show('');

            $('#divRestricitononAccessNote').hide('');
            $('#divTypesofReportandPeriodCoveredNote').hide('');

            $('#divBibliography').show('');
            $('#divFormattedContents').show('');

            $('#divDissertation').hide('');
            $('#divDissertationNote').hide('');
            $('#divDegreeType').hide('');
            $('#divNameofGrantingInstitution').hide('');
            $('#divYearDegreeGranted').hide('');

            $('#divPlayingTime').hide('');
            $('#divAbbreviatedTitle').hide('');
            $('#divSoundCharacteristics').hide('');
            $('#divDatesofPublication').show('');
            $('#divTimePeriodofCreation').hide('');
            $('#divCitationReferencesNote').show('');

            $('#divlblchkAdditonalPhysicalForm').hide('');
            $('#divchkAdditonalPhysicalForm').hide('');


            $('#div').hide('');


            $('#ISSN').val('');
        }
    }

    function onContentTypeTerm() 
    { 
        var varContentTerm=($('#cboContentTypeTerm').val())
        $('#cboContentTypeCode').val(varContentTerm).change();
    }

    function onMediaTypeID() 
    { 
        var varMediaCode=($('#cboMediaTypeID').val())
        $('#cboMediaTypeCode').val(varMediaCode).change();
    }

    function onCarrierTypeID() 
    { 
        var varCarrierCode=($('#cboCarrierTypeID').val())
        $('#cboCarrierTypeCode').val(varCarrierCode).change();
    }
</script>


<style type="text/css">
    table tr td:first-of-type 
    {
        cursor: pointer;
    }
</style>




