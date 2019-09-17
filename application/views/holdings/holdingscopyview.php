<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/HoldingsCopyTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>

<div class="content-wrapper" id="divholdingscopy">
    <section class="content-header">
        <h1>
            Holdings Copy
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
            <li class="active"><i class="fa fa-copy"></i>Holdings Copy</li>
        </ol>
    </section>
    <br>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $id ?></h3>
            <h3 class="box-title"> <b> - <?php echo $title ?> </b></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-body">
                            <table id="tblHoldingsCopy" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th rowspan="1">Acquisitions ID</th>
                                        <th rowspan="1">Circulation Number</th>
                                        <th rowspan="1">CopyNumber</th>
                                        <th rowspan="1">Front Page</th>
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
            <h3 class="box-title">Holding Copy Data Entry</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapse" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
            </div>
        </div>

        <div class="collapse" id="collapseExample">
            <form id="form">
                <div class="box">
                    <div class="box">
                        <div class="form-group">
                            <div class="box-header with-border">
                                <h4>Location</h4>

                                <div class="box-body" style="display: none" id="divLocation">
                                    <label class="col-sm-12" id="lblLocation"></label>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Sub Location</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>852b</i>
                                        </div>

                                        <select class="form-control select2" id="cboLocationID" name="cboLocationID" style="width: 100%; display: none;">
                                            <?php foreach($location as $location): ?>
                                                <option value="<?php echo $location['LocationID']; ?>">
                                                    <?php echo $location['Location']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="box" id="divFrequency" hidden="hidden">
                                <div class="box-body">

                                    <h4>Frequency</h4>

                                    <div class="box-body">
                                        <label class="col-sm-3">Frequency</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>310</i>
                                            </div>

                                            <select class="form-control select2" id="cboHoldingsCopyFrequency" name="cboHoldingsCopyFrequency" onchange="onHoldingsCopyFrequencyChange()" style="width: 20%;">
                                                <option value="Daily">Daily</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Quarterly">Quarterly</option>
                                                <option value="SemiAnnually">SemiAnnually</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="showFrequency" style="display: none;">
                                        <div class="form-group frequency" style="" style="display: none;">
                                            <div class="box-body" id="Month">
                                                <label class="col-sm-3" id="lblfrequency"></label>

                                                <div class="row">
                                                    <div class="input-group">
                                                        <div class="col-sm-4 day" id="divDay" style="display: none;">
                                                            <select class="form-control select2" id="cboHoldingsCopyDay" name="cboHoldingsCopyDay" style="width: 100%; ">
                                                                <?php for($x = 1; $x <= 31; $x++){ ?>
                                                                    <option value="<?php echo $x; ?>">
                                                                        <?php echo $x; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 week" id="divWeek" style="display: none;">
                                                            <select class="form-control select2" id="cboHoldingsCopyWeek" name="cboHoldingsCopyWeek" style="width: 100%; ">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-5 week" id="divMonth" style="display: none;">

                                                            <select class="form-control select2" id="cboHoldingsCopyMonth" name="cboHoldingsCopyMonth" style="width: 100%; ">
                                                                <?php foreach($months as $month): ?>
                                                                    <option value="<?php echo $month['MonthID']; ?>">
                                                                        <?php echo $month['Month']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                            </select>

                                                        </div>

                                                        <div class="col-sm-6" id="divQuarter" style="display: none;">

                                                            <select class="form-control select2" id="cboHoldingsCopyQuarter" name="cboHoldingsCopyQuarter" style="width: 100%; ">
                                                                <option value="1">1st Quarter</option>
                                                                <option value="2">2nd Quarter</option>
                                                                <option value="3">3rd Quarter</option>
                                                                <option value="4">4th Quarter</option>
                                                            </select>

                                                        </div>

                                                        <div class="col-sm-6 semiannual" id="divSemiAnnual" style="display: none;">

                                                            <select class="form-control select2" id="cboHoldingsCopySemiAnnual" name="cboHoldingsCopySemiAnnual" style="width: 100%; ">
                                                                <option value="1">1st Half</option>
                                                                <option value="2">2nd Half</option>
                                                            </select>

                                                        </div>

                                                        <div class="col-sm-3 year" id="divYear" style="display: none; ">
                                                            <input type="text" class="form-control dpyear" id="frequencyYear" name="frequencyYear">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="form-group">
                            <div class="box-header with-border">

                                <h4>Item Information - Basic Bibliographic Unit </h4>

                                <input name="HoldingsCopyID" id="HoldingsCopyID" hidden="" type="text">

                                <input name="AcquisitionID" id="AcquisitionID" hidden="hidden">
                                <input name="HoldingsID" id="HoldingsID" hidden="" value="<?php echo $id ?>" />

                                <div class="box-body">
                                    <label class="col-sm-3">Material Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>006</i>
                                        </div>

                                        <select class="form-control select2" id="cboMaterialType" name="cboMaterialType" style="width: 100%; display: none;">
                                            <?php foreach($types as $type): ?>
                                                <option value="<?php echo $type['MaterialTypeID']; ?>">
                                                    <?php echo $type['MaterialType']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>

                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>

                                    </div>

                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Accession Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876a</i>
                                        </div>

                                        <input name="AccessionNumber" id="AccessionNumber" type="text" class="form-control redph" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>

                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Circulation Number </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876b</i>
                                        </div>

                                        <input name="CirculationNumber" id="CirculationNumber" type="text" class="form-control redph" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>

                                    </div>
                                </div>

                                <div id="Divcost">
                                    <div class="box-body">
                                        <label class="col-sm-3">Cost / Price</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i>876c</i>
                                            </div>

                                            <input name="Cost" id="Cost" type="text" class="form-control" data-mask>
                                            <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Date of Acquisition</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876d</i>
                                        </div>

                                        <input name="DateAcquired" id="DateAcquired" type="text" class="form-control">
                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Acquisition Mode</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876e</i>
                                        </div>

                                        <select class="form-control select2" id="cboAcquisitionMode" name="cboAcquisitionMode" onchange="onAcquisitionModeChange()" style="width: 100%;">
                                            <?php foreach($sources as $source): ?>
                                                <option value="<?php echo $source['SourceID']; ?>">
                                                    <?php echo $source['Source']; ?>
                                                </option>
                                                <?php endforeach;; ?>
                                        </select>

                                        <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body" style="display: none;" id="Source">
                                    <label class="col-sm-3">Source</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding-right: 19; padding-left: 19;">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input name="Donor" id="Donor" type="text" class="form-control" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Use restrictions </label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding-right: 10; padding-left: 10;">
                                            <i>876h</i>
                                        </div>

                                        <input name="UseRestrictions" id="UseRestrictions" type="text" class="form-control" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Item Status</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876j</i>
                                        </div>

                                        <input name="ItemStatus" id="ItemStatus" type="text" class="form-control" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Temporary Location</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876l</i>
                                        </div>

                                        <input name="TemporaryLocation" id="TemporaryLocation" type="text" class="form-control" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Copy Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>876t</i>
                                        </div>

                                        <input name="CopyNumber" id="CopyNumber" type="text" class="form-control redph" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Nonpublic Note</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding-right: 10; padding-left: 10;">
                                            <i>876x</i>
                                        </div>

                                        <input name="NonPublicNote" id="NonPublicNote" type="text" class="form-control" data-mask>
                                        <div class="input-group-addon recolor " rel="tooltip " title="<?php echo $tooltipArray[$ctr++]; ?>">
                                            <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                        </div>

                                    </div>
                                </div>

                                <div class="box-body">
                                    <label class="col-sm-3">Copyright Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding-right: 19; padding-left: 19;">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control dpyear" id="CopyrightDate" name="CopyrightDate">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-body">
                                <div class="box-body">
                                    <input name="InventoryID" id="InventoryID" hidden="hidden">

                                    <label>Inventory Status: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-check-square"></i>
                                        </div>
                                        <select field-type="Select" name="InventoryStatus" id="InventoryStatus" class="form-control select2" style="width: 20%;">
                                            <option value="0">Uninventoried</option>
                                            <option value="1">Inventoried</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <label>Date of Inventory</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-check-o"></i>
                                        </div>
                                        <input name="InventoryDate" id="InventoryDate" class="form-control" style="width: 20%;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group pull-right">
                                <button type="button" onclick="save_record_holdingscopy()" id="btnSubmit" class="btn btn-primary">
                                    <label id="lblSubmit">Submit</label>
                                </button>
                                <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
                                <button action="cancel" onclick="delete_holdingscopy_records()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="box-footer">
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() 
    {
        $('#tblHoldingsCopy').DataTable({
            "scrollX": true,
            "ajax": {
                url: "<?php echo site_url("holdings_controller/holdingscopy_datatable") ?>",
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
                    title: 'HoldingsCopy'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'CSV',
                    className: 'opt_icon opt_icon2c',
                    filename: 'HoldingsCopy'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'Excel',
                    className: 'opt_icon opt_icon3c',
                    filename: 'HoldingsCopy'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                    },
                    text: '',
                    titleAttr: 'PDF',
                    className: 'opt_icon opt_icon4c',
                    filename: 'HoldingsCopy'
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
        });
    });

    $(document).ready(function() 
    {
        $("#collapseExample").on("hide.bs.collapse", function() {
            $("#divcollapse").html('<i class="fa fa-plus"></i>');
        });
        $("#collapseExample").on("show.bs.collapse", function() {
            $("#divcollapse").html('<i class="fa fa-minus"></i>');
        });
    });

    function edit_holdingscopy(id, materialid) 
    {
        scroll_top();

        if (materialid == 2)
            $('#divFrequency').show('');
        else
            $('#divFrequency').hide('');

        $('#lblSubmit').text("Save");
        $("#cboMaterialType").prop("disabled", true);

        if (!$("#form").is(":visible"))
            $('#divcollapse').click();

        $.ajax({
            url: "<?php echo site_url("Holdings_controller/holdingscopy_edit")?>/" + id,
            method: "POST",
            data: 
            {
                id: id
            },
            dataType: "json",
            success: function(data)
            {
                $('#HoldingsCopyID').val(data.HoldingsCopyID);
                $('#AcquisitionID').val(data.AcquisitionID);
                $('#HoldingsID').val(data.HoldingsID);
                $('#cboMaterialType').val(materialid).change();
                $('#cboLocationID').val(data.cboLocationID).change();
                $('#AccessionNumber').val(data.AccessionNumber);
                $('#CirculationNumber').val(data.CirculationNumber);
                $('#Cost').val(data.Cost);
                $('#DateAcquired').val(data.DateAcquired);
                $('#cboAcquisitionMode').val(data.cboAcquisitionMode).change();
                $('#Donor').val(data.Source);
                $('#UseRestrictions').val(data.UseRestrictions);
                $('#ItemStatus').val(data.ItemStatus);
                $('#TemporaryLocation').val(data.TemporaryLocation);
                $('#CopyNumber').val(data.CopyNumber);
                $('#NonPublicNote').val(data.NonPublicNote);
                $('#CopyrightDate').val(data.CopyrightDate);

                $('#cboHoldingsCopyFrequency').val(data.cboHoldingsCopyFrequency).change();
                $('#cboHoldingsCopyDay').val(data.cboHoldingsCopyDay).change();
                $('#cboHoldingsCopyWeek').val(data.cboHoldingsCopyWeek).change();
                $('#cboHoldingsCopyMonth').val(data.cboHoldingsCopyMonth).change();
                $('#cboHoldingsCopyQuarter').val(data.cboHoldingsCopyQuarter).change();
                $('#cboHoldingsCopySemiAnnual').val(data.cboHoldingsCopySemiAnnual).change();
                $('#frequencyYear').val(data.frequencyYear);

                $('#InventoryID').val(data.InventoryID);
                $('#InventoryStatus').val(data.InventoryStatus).change();
                $('#InventoryDate').val(data.InventoryDate);
                $('#UserID').val(data.UserID);

                $('#divLocation').show();
                $('#lblLocation').text(data.ConsortiumAdd);
            }
        });
    }

    function save_record_holdingscopy() 
    {
        if ($('#HoldingsCopyID').val() != "") 
        {
            $.ajax({
                url: "<?php echo site_url("Holdings_controller/holdingscopy_create")?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if (data.status) 
                    {
                        $('#tblHoldingsCopy').DataTable().ajax.reload(null, false);
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
        else
        {
            toastr.error("Please select a record to modify");
        }
    }

    function view_frontpage_holdingscopy(AcquiID, title) 
    {
        $.ajax({
            url: "<?php echo base_url("holdings_controller/setacquisitionid")?>",
            method: "POST",
            data: 
            {
                AcquiID: AcquiID,
                title: title
            },
            dataType: "json",
            success: function(data) 
            {
                if (data.status)
                    window.location.href = "<?php echo site_url('holdings_controller/holdingscopyfrontpageindexforserials');?>";
            }
        });
    }

    function delete_holdingscopy_records() 
    {
        if ($('#HoldingsCopyID').val() != "") 
        {
            if (confirm('Are you sure you want to delete this record?')) 
            {
                var id = $('#HoldingsCopyID').val();
                $.ajax({
                    data: "id=" + id,
                    url: "<?php echo site_url('holdings_controller/delete_holdingscopy')?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        clear_fields();
                        toastr.success("Record deleted successfully.");
                    }
                });
            }
        } 
        else
        {
            toastr.error("Please select a record to delete!");
        }
    }

    function clear_fields() 
    {
        $('#form')[0].reset();

        $('#cboLocationID').val('0').change();
        $('#cboMaterialType').val('0').change();
        $('#cboAcquisitionMode').val('0').change();
        $('#cboHoldingsCopyDay').val('0').change();
        $('#cboHoldingsCopyWeek').val('0').change();
        $('#cboHoldingsCopyMonth').val('0').change();
        $('#cboHoldingsCopyQuarter').val('0').change();
        $('#cboHoldingsCopySemiAnnual').val('0').change();
        $('#InventoryStatus').val('0').change();

        $('#lblSubmit').text("Submit");
        $('#tblHoldingsCopy').DataTable().ajax.reload(null, false);

        $('#divLocation').hide();

        scroll_top();
    }

    function onAcquisitionModeChange() 
    {
        if ($('#cboAcquisitionMode').val() == 1 || $('#cboAcquisitionMode').val() == 2) 
        {
            $('#Divcost').show('slow');
            $('#Source').hide('slow');
            $('#Source').val("");
        } 
        else if ($('#cboAcquisitionMode').val() == 3 || $('#cboAcquisitionMode').val() == 4 || $('#cboAcquisitionMode').val() == 5) 
        {
            $('#Source').show('slow');
            $('#Cost').val("");
            $('#Divcost').hide('slow');
        } 
        else 
        {
            $('#Source').hide('slow');
            $('#Source').val("");
            $('#Cost').val("");
            $('#Divcost').hide('slow');
        }
    }

    function onHoldingsCopyFrequencyChange()
    {
        if ($('#cboHoldingsCopyFrequency').val() == "Daily")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divDay').show();
            $('#divWeek').hide();
            $('#divMonth').show();
            $('#divQuarter').hide();
            $('#divSemiAnnual').hide();
            $('#divYear').show();
            $('#lblfrequency').text("Day/Month/Year");
        } 
        else if ($('#cboHoldingsCopyFrequency').val() == "Weekly")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divWeek').show();
            $('#divDay').hide();
            $('#divMonth').show();
            $('#divQuarter').hide();
            $('#divSemiAnnual').hide();
            $('#divYear').show();
            $('#lblfrequency').text("Week/Month/Year");
        } 
        else if ($('#cboHoldingsCopyFrequency').val() == "Monthly")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divWeek').hide();
            $('#divDay').hide();
            $('#divMonth').show();
            $('#divQuarter').hide();
            $('#divSemiAnnual').hide();
            $('#divYear').show();
            $('#lblfrequency').text("Month/Year");
        } 
        else if ($('#cboHoldingsCopyFrequency').val() == "Quarterly")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divWeek').hide();
            $('#divDay').hide();
            $('#divMonth').hide();
            $('#divQuarter').show();
            $('#divSemiAnnual').hide();
            $('#divYear').show();
            $('#lblfrequency').text("Quarter/Year");
        }
        else if ($('#cboHoldingsCopyFrequency').val() == "SemiAnnually")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divWeek').hide();
            $('#divDay').hide();
            $('#divMonth').hide();
            $('#divQuarter').hide();
            $('#divSemiAnnual').show();
            $('#divYear').show();
            $('#lblfrequency').text("Semester/Year");
        } 
        else if ($('#cboHoldingsCopyFrequency').val() == "Yearly")
        {
            $('#showFrequency').hide('slow');
            $('#showFrequency').show('slow');
            $('#divWeek').hide();
            $('#divDay').hide();
            $('#divMonth').hide();
            $('#divQuarter').hide();
            $('#divSemiAnnual').hide();
            $('#divYear').show();
            $('#lblfrequency').text("Year");
        }
    }

     $("#InventoryStatus").change(function () {
        if(this.value == 1)
        {
            var d = new Date();
            $('#InventoryDate').val(d.yyyymmdd());
            $('#InventoryDate').enabled(true);
        }
        else
        {
            $('#InventoryDate').val("");
            $('#InventoryDate').enabled(false);
        }
    });

    $('.dpyear').datepicker({
        minViewMode: 2,
        format: 'yyyy',
        autoclose: true,
        orientation: "bottom auto"
    });

    $('#DateAcquired, #InventoryDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: 'true'
    });
</script>

<style type="text/css">
    table tr td: nth-child(2) {
        cursor: pointer;
    }

    .ui-datepicker-calendar {
        display: none;
    }
</style>