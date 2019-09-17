<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acquisitions_controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();   
		$this->load->model("Acquisition_model");
	} 

	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['sources'] = $this->Acquisition_model->get_source();
		$data['types'] = $this->Acquisition_model->get_type();
		$data['months'] = $this->Acquisition_model->get_month();

		$page = array(
			'admin'  => $modules['admin'],
			'acquisition'  => $modules['acquisition'],
			'holdings'  => $modules['holdings'],
			'circulation'  => $modules['circulation'],
			'accounts' => $modules['accounts'],
			'others' => $modules['others'],
			'user' => $this->Accounts_model->get_session_data('LibrarianName'),
			'image' => $this->Accounts_model->get_session_data('Image'),
			'notifs' => $this->Accounts_model->get_notifs()
		);

		$this->load->template('acquisitions/new-acquisition', $data, $page);
	}

	// Create record
	public function create()
	{
	    // Entry validation
		$this->validate_data();

		$ids = array();
		$holdings_id = '';
		$copy_num = '';
		$day = '';
		$week = '';
		$month = '';
		$quarter = '';
		$semiannual = '';
		$user = $this->Accounts_model->get_session_data('UserName');

		if($this->input->post('cboMaterialType') == '2')
		{
			if($this->input->post('cboFrequency') == 'Daily')
			{
				$day = $this->input->post('cboDay');
				$month = $this->input->post('cboMonth');
			}
			if($this->input->post('cboFrequency') == 'Weekly')
			{
				$week = $this->input->post('cboWeek');
				$month = $this->input->post('cboMonth');
			}
			if($this->input->post('cboFrequency') == 'Monthly' || $this->input->post('cboFrequency') == 'Irregular')
			{
				$this->input->post('cboMonth') == '' ? $month = '' : $month = $this->input->post('cboMonth');
			}
			if($this->input->post('cboFrequency') == 'Quarterly')
			{
				$quarter = $this->input->post('cboQuarter');
			}
			if($this->input->post('cboFrequency') == 'SemiAnnually')
			{
				$semiannual = $this->input->post('cboSemiAnnual');
			}   
		}


		$this->input->post('txtClassificationNum') == '' ? $CallNum = '' : $CallNum = '$a' . $this->input->post('txtClassificationNum');
		$this->input->post('txtAuthorNum') == '' ? $sAuthorNum = '' : $sAuthorNum = '$b' . $this->input->post('txtAuthorNum');
		$this->input->post('txtCopyrightDate') == '' ? $sCopyrightDate = '' : $sCopyrightDate = '$c' . $this->input->post('txtCopyrightDate');

		$this->input->post('txtPersonal') == '' ? $cboPersonal = '' : $cboPersonal = $this->input->post('cboPersonal');
		$this->input->post('txtPersonal') == '' ? $txtPersonal = '' : $txtPersonal = '$a' . $this->input->post('txtPersonal');
		$this->input->post('txtB100') == '' ? $txtB100 = '' : $txtB100 = '$b' . $this->input->post('txtB100');
		$this->input->post('txtC100') == '' ? $txtC100 = '' : $txtC100 = '$c' . $this->input->post('txtC100');
		$this->input->post('txtE100') == '' ? $txtE100 = '' : $txtE100 = '$e' . $this->input->post('txtE100');
		$this->input->post('txtD100') == '' ? $txtD100 = '' : $txtD100 = '$d' . $this->input->post('txtD100');
		$this->input->post('txtQ100') == '' ? $txtQ100 = '' : $txtQ100 = '$q' . $this->input->post('txtQ100');
		$this->input->post('txtU100') == '' ? $txtU100 = '' : $txtU100 = '$u' . $this->input->post('txtU100');

		$this->input->post('txtCorporate') == '' ? $cboCorporate = '' : $cboCorporate = $this->input->post('cboCorporate');
		$this->input->post('txtCorporate') == '' ? $txtCorporate = '' : $txtCorporate = '$a' . $this->input->post('txtCorporate');
		$this->input->post('txtB110') == '' ? $txtB110 = '' : $txtB110 = '$b' . $this->input->post('txtB110');
		$this->input->post('txtC110') == '' ? $txtC110 = '' : $txtC110 = '$c' . $this->input->post('txtC110');
		$this->input->post('txtD110') == '' ? $txtD110 = '' : $txtD110 = '$d' . $this->input->post('txtD110');
		$this->input->post('txtN110') == '' ? $txtN110 = '' : $txtN110 = '$n' . $this->input->post('txtN110');

		$this->input->post('txtPersonal700') == '' ? $cboPersonal700 = '' : $cboPersonal700 = $this->input->post('cboPersonal700');
		$this->input->post('txtPersonal700') == '' ? $txtPersonal700 = '' : $txtPersonal700 = '$a' . $this->input->post('txtPersonal700');
		$this->input->post('txtB700') == '' ? $txtB700 = '' : $txtB700 = '$b' . $this->input->post('txtB700');
		$this->input->post('txtC700') == '' ? $txtC700 = '' : $txtC700 = '$c' . $this->input->post('txtC700');
		$this->input->post('txtE700') == '' ? $txtE700 = '' : $txtE700 = '$e' . $this->input->post('txtE700');
		$this->input->post('txtD700') == '' ? $txtD700 = '' : $txtD700 = '$d' . $this->input->post('txtD700');
		$this->input->post('txtQ700') == '' ? $txtQ700 = '' : $txtQ700 = '$q' . $this->input->post('txtQ700');
		$this->input->post('txtU700') == '' ? $txtU700 = '' : $txtU700 = '$u' . $this->input->post('txtU700');

		$this->input->post('txtCorporate710') == '' ? $cboCorporate710 = '' : $cboCorporate710 = $this->input->post('cboCorporate710');
		$this->input->post('txtCorporate710') == '' ? $txtCorporate710 = '' : $txtCorporate710 = '$a' . $this->input->post('txtCorporate710');
		$this->input->post('txtB710') == '' ? $txtB710 = '' : $txtB710 = '$b' . $this->input->post('txtB710');
		$this->input->post('txtC710') == '' ? $txtC710 = '' : $txtC710 = '$c' . $this->input->post('txtC710');
		$this->input->post('txtD710') == '' ? $txtD710 = '' : $txtD710 = '$d' . $this->input->post('txtD710');

		$this->input->post('txtTitle') == '' ? $Title = '' : $Title = '$a' . $this->input->post('txtTitle');
		$this->input->post('txtRmndrTitle') == '' ? $RmndrTitle = '' : $RmndrTitle = '$b' . $this->input->post('txtRmndrTitle');
		$this->input->post('txtStmntRspnsblty') == '' ? $sStmntRspnsblty = '' : $sStmntRspnsblty = '$c' . $this->input->post('txtStmntRspnsblty');

		$this->input->post('txtEdition') == '' ? $Edition = '' : $Edition = '$a' . $this->input->post('txtEdition');
		$this->input->post('txtRmndrEdtnStmnt') == '' ? $RmndrEdtnStmnt = '' : $RmndrEdtnStmnt = '$b' . $this->input->post('txtRmndrEdtnStmnt');

		$sImprint = $this->input->post('cboImprint');
		$iImprintType = $this->input->post('cboMaterialTypeImprint');
		
		$this->input->post('txtPublicationPlace') == '' ? $PublicationPlace = '' : $PublicationPlace = '$a' . $this->input->post('txtPublicationPlace');
		$this->input->post('txtPublisher') == '' ? $Publisher = '' : $Publisher = '$b' . $this->input->post('txtPublisher');
		$this->input->post('txtPublicationDate') == '' ? $PublicationDate = '' : $PublicationDate = '$c' . $this->input->post('txtPublicationDate');
		$PublicationYear = $this->input->post('txtPublicationDate');

		$this->input->post('txtExtent') == '' ? $Extent = '' : $Extent = '$a' . $this->input->post('txtExtent');
		$this->input->post('txtOtherPhysical') == '' ? $OtherPhysicalDtl = '' : $OtherPhysicalDtl = '$b' . $this->input->post('txtOtherPhysical');
		$this->input->post('txtDimensions') == '' ? $Dimensions = '' : $Dimensions = '$c' . $this->input->post('txtDimensions');

	    	//CONCATENATION
		$CallNumber = "";
		$PersonalAuthor = "";
		$CorporateAuthor = "";
		$PersonalAuthorAddedEntry = "";
		$CorporateAuthorAddedEntry = "";
		$TitleStatement = "";
		$EditionStatement = "";
		$Publication = "";
		$PhysicalDescriptionEtc = "";

		if($CallNum != "" || $sAuthorNum != "" || $sCopyrightDate != "")
			$CallNumber = '050##' . $CallNum . $sAuthorNum . $sCopyrightDate;

		if($cboPersonal != "")
			$PersonalAuthor = '100' . $cboPersonal . '#' . $txtPersonal . $txtB100 . $txtC100 . $txtE100 . $txtD100 . $txtQ100 . $txtU100;

		if($cboCorporate != "")
			$CorporateAuthor = '110' . $cboCorporate . '#' . $txtCorporate . $txtB110 . $txtC110 . $txtD110 . $txtN110;

		if($cboPersonal700 != "")
			$PersonalAuthorAddedEntry = '700' . $cboPersonal700 . '#' . $txtPersonal700 . $txtB700 . $txtC700 . $txtE700 . $txtD700 . $txtQ700 . $txtU700;

		if($cboCorporate710 != "")
			$CorporateAuthorAddedEntry = '710' . $cboCorporate710 . '#' . $txtCorporate710 . $txtB710 . $txtC710 . $txtD710;

		if($Title != "" || $RmndrTitle != "" || $sStmntRspnsblty != "") 
			$TitleStatement = '24500' . $Title . $RmndrTitle . $sStmntRspnsblty;

		if($Edition != "" || $RmndrEdtnStmnt != "")
			$EditionStatement = '250##' . $Edition . $RmndrEdtnStmnt;

		if($PublicationPlace != "" || $Publisher != "" || $PublicationDate != "")
			$Publication = '264' . $sImprint . $iImprintType . $PublicationPlace . $Publisher . $PublicationDate;

		if($Extent != "" || $OtherPhysicalDtl != "" || $Dimensions != "")
			$PhysicalDescriptionEtc = '300##' . $Extent . $OtherPhysicalDtl . $Dimensions;

		$this->input->post('cboMaterialType') != '2' ? $sFrequency = '' : $sFrequency = $this->input->post('cboFrequency');

		$this->input->post('txtIssueDate') != "" ? $IssueDate = date('Y-m-d', strtotime($this->input->post('txtIssueDate'))) : $IssueDate = NULL;

		$this->input->post('txtDateAcquired') != "" ? $DateAcquired = date('Y-m-d', strtotime($this->input->post('txtDateAcquired'))) : $DateAcquired = NULL;

		$this->input->post('txtTitle') == "" ? $title = $this->input->post('txtSeriesStmnt') : $title = $this->input->post('txtTitle');

		$holdings_record = array
		(
			'MaterialTypeID' => $this->input->post('cboMaterialType'),
			'ISBN' => $this->input->post('txtISBN'),
			'ISSN' => $this->input->post('txtISSN'),
			'CallNumber' => $CallNumber,
			'TitleStatement' => $TitleStatement,
			'Edition' => $EditionStatement,
			'PhysicalDescriptionEtc' => $PhysicalDescriptionEtc,
			'SeriesStatement' => $this->input->post('txtSeriesStmnt'),
			'BibliographicNote' => $this->input->post('txtBibliography')
		);

		$holdingscopy_record = array
		(
			'Title' => $title,
			'SeriesStatement' => $this->input->post('txtSeriesStmnt'),
			'AccessionNumber' => $this->input->post('txtAccessionNum'),
			'CirculationNumber' => $this->input->post('txtCirculationNum'),
			'Cost' => $this->input->post('txtCost'),
			'DateAcquired' => $DateAcquired,
			'AcquisitionMode' => $this->input->post('cboAcquiMode'),
			'Source' => $this->input->post('txtSource'),
			'UseRestrictions' => $this->input->post('txtUseRestrictions'),
			'ItemStatus' => $this->input->post('txtItemStatus'),
			'TemporaryLocation' => $this->input->post('txtTempLocation'),
			'CopyNumber' => $this->input->post('txtCopyNum'),
			'NonPublicNote' => $this->input->post('txtNonpublic'),
			'Frequency' => $sFrequency,
			'Volume' => $this->input->post('txtVolume'),
			'IssueDate' => $IssueDate,
			'IssueNumber' => $this->input->post('txtIssueNum'),
			'CopyrightDate' => $PublicationYear
		);

		$acquisition_record = array
		(
			'Title' => $title,
			'CopyNumber' => $this->input->post('txtCopyNum'),
			'Day' => $day,
			'Week' => $week,
			'Month' => $month,
			'Quarter' => $quarter,
			'Semiannual' => $semiannual,
			'Year' => $this->input->post('txtYear')
		);

		$author_record1 = array
		(
			'AuthorTag' => "100",
			'AuthorName' => $PersonalAuthor
		);
		$author_record2 = array
		(
			'AuthorTag' => "110",
			'AuthorName' => $CorporateAuthor
		);
		$author_record3 = array
		(
			'AuthorTag' => "700",
			'AuthorName' => $PersonalAuthorAddedEntry
		);
		$author_record4 = array
		(
			'AuthorTag' => "710",
			'AuthorName' => $CorporateAuthorAddedEntry
		);

		$publisher_record = array
		(
			'Publication' => $Publication,
			'PublicationYear' => $PublicationYear
		);

		if($this->input->post('txtIsNew') == 'add')
		{
			if($this->input->post('txtHoldingsID') == '')
			{
	        	// Generate IDs via stored proc
				$ids = $this->Acquisition_model->generate_ids();
	        	// $copy_num = '1';
				$holdings_id = $ids->HoldingsID;
			}
			else if($this->input->post('txtHoldingsID') != '')
			{
				$ids = $this->Acquisition_model->generate_ids();
				$holdings_id = $this->input->post('txtHoldingsID');
			}
		}

		if($this->input->post('txtIsNew') == "add")
		{
			$holdings_record['HoldingsID'] = $holdings_id;
			$holdings_record['CreatedBy'] = $user;

			$holdingscopy_record['AcquisitionID'] = $ids->AcquisitionID;
			$holdingscopy_record['HoldingsID'] = $holdings_id;
	      	// $holdingscopy_record['sCopyNumber'] = 'c'.$copy_num;
			$holdingscopy_record['CreatedBy'] = $user;

	      	// $acquisition_record['sCopyNumber'] = 'c'.$copy_num;
			$acquisition_record['AcquisitionID'] = $ids->AcquisitionID;
			$acquisition_record['HoldingsID'] = $holdings_id;
			$acquisition_record['CreatedBy'] = $user;

			$author_record1['HoldingsID'] = $holdings_id;
			$author_record1['CreatedBy'] = $user;

			$author_record2['HoldingsID'] = $holdings_id;
			$author_record2['CreatedBy'] = $user;

			$author_record3['HoldingsID'] = $holdings_id;
			$author_record3['CreatedBy'] = $user;

			$author_record4['HoldingsID'] = $holdings_id;
			$author_record4['CreatedBy'] = $user;

			$publisher_record['HoldingsID'] = $holdings_id;
			$publisher_record['CreatedBy'] = $user;

			$create_holdingscopy = $this->Acquisition_model->create_holdingscopy($holdingscopy_record);

			if($create_holdingscopy['status'] == 'success')
			{
				if($this->input->post('txtHoldingsID') == '')
				{
					$this->Acquisition_model->create_holdings($holdings_record); 
					$this->Acquisition_model->create_publisher($publisher_record);

					$PersonalAuthor != "" ? $this->Acquisition_model->create_author($author_record1) : $this->relax();
					$CorporateAuthor != "" ? $this->Acquisition_model->create_author($author_record2) : $this->relax();
					$PersonalAuthorAddedEntry != "" ? $this->Acquisition_model->create_author($author_record3) : $this->relax();
					$CorporateAuthorAddedEntry != "" ? $this->Acquisition_model->create_author($author_record4) : $this->relax();
				}

				$this->Acquisition_model->create_acquisition($acquisition_record);
				$this->create_log(1, $ids->AcquisitionID);
				$this->Acquisition_model->update_ids(TRUE);
			}
		}
		else if($this->input->post('txtIsNew') == "edit")
		{
			if($this->input->post('txtCopyNum') == 'c1')
			{
				$holdings_record['UpdatedBy'] = $user;
				$holdings_record['UpdatedAt'] = date('Y-m-d H:i:s');
				$this->Acquisition_model->update_holdings($this->input->post('txtHoldingsID'), $holdings_record);
			}

			$holdingscopy_record['UpdatedBy'] = 
			$author_record1['UpdatedBy'] = 
			$author_record2['UpdatedBy'] = 
			$author_record3['UpdatedBy'] = 
			$author_record4['UpdatedBy'] = 
			$publisher_record['UpdatedBy'] = 
			$acquisition_record['UpdatedBy'] = $user;

			$holdingscopy_record['UpdatedAt'] =
			$author_record1['UpdatedAt'] = 
			$author_record2['UpdatedAt'] = 
			$author_record3['UpdatedAt'] = 
			$author_record4['UpdatedAt'] = 
			$publisher_record['UpdatedAt'] = 
			$acquisition_record['UpdatedAt'] = date('Y-m-d H:i:s');

			$create_holdingscopy = $this->Acquisition_model->update_holdingscopy($this->input->post('txtAcquisitionID'), $this->input->post('txtHoldingsID'), $holdingscopy_record);  

			if($create_holdingscopy['status'] == 'success')
			{
				$this->Acquisition_model->update_publisher($this->input->post('txtHoldingsID'), $publisher_record);
				$this->Acquisition_model->update_acquisition($this->input->post('txtAcquisitionID'), $this->input->post('txtHoldingsID'), $acquisition_record);

				$PersonalAuthor != "" ? $this->Acquisition_model->update_author($this->input->post('txtHoldingsID'), $author_record1, "100") : $this->relax();
				$CorporateAuthor != "" ? $this->Acquisition_model->update_author($this->input->post('txtHoldingsID'), $author_record2, "110") : $this->relax();
				$PersonalAuthorAddedEntry != "" ? $this->Acquisition_model->update_author($this->input->post('txtHoldingsID'), $author_record3, "700") : $this->relax();
				$CorporateAuthorAddedEntry != "" ? $this->Acquisition_model->update_author($this->input->post('txtHoldingsID'), $author_record4, "710") : $this->relax();

				//$this->Acquisition_model->update_ids(FALSE);
			}  
		}

		echo json_encode($create_holdingscopy);
	}

	// Load data into Datatable
	public function load_table()
	{
    	// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

	    	// Get records
		$records = $this->Acquisition_model->get_acquisitions($_POST['type']);

		$data = array();

	    	// Store records into sub_array
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array['AcquisitionID'] = '<a type="text" onclick="edit_record('."'".$r->AcquisitionID."'".')">'."".$r->AcquisitionID."".'</a>';
			$sub_array['Title'] = $r->Title;
			$sub_array['Author'] = $r->Author;
			$sub_array['MaterialType'] = $r->MaterialType;
			$sub_array['CopyrightDate'] = $r->CopyrightDate;
			$sub_array['CopyNumber'] = $r->CopyNumber;
			$sub_array['Catalog'] = $r->Catalog;
			$sub_array['CreatedBy'] = $r->CreatedBy;
			$sub_array['CreatedAt'] = $r->CreatedAt;
	      		// $sub_array['Action'] = '<a type="button" name="update" onclick="edit_record('."'".$r->AcquisitionID."'".')" class="btn btn-warning btn-xs">Update</a>
	      		// <a type="button" name="delete" onclick="delete_record('."'".$r->AcquisitionID."'".')" class="btn btn-danger btn-xs">Delete</a>';
			$data[] = $sub_array;
		}

	    	// Store everything into another array
		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

	    	// Encode data
		echo json_encode($output);
		exit();
	}

	// Load single record
	public function load_single_record()
	{
		$output = array();  

	    	// Get recrod via ID
		$data = $this->Acquisition_model->load_single_record($_POST["id"]);  


	    	// Save into array every fields
		foreach($data as $row)  
		{ 
			$output['txtAcquisitionID'] = $row->txtAcquisitionID;   
			$output['txtHoldingsID'] = $row->txtHoldingsID;   
			$output['cboMaterialType'] = $row->cboMaterialType;  
			$output['txtISBN'] = $row->txtISBN; 
			$output['txtISSN'] = $row->txtISSN;  

			$output['txtClassificationNum'] = $row->txtClassificationNum;
			$output['txtAuthorNum'] =  $row->txtAuthorNum;
			$output['txtCopyrightDate'] =  $row->txtCopyrightDate; 

			$output['author_tag'] = $row->authorTag;
			$output['cboPersonal'] = $row->cboPersonal;
			$output['txtPersonal'] = $row->txtPersonal;
			$output['txtB100'] = $row->txtB100;
			$output['txtC100'] = $row->txtC100;
			$output['txtE100'] = $row->txtE100;
			$output['txtD100'] = $row->txtD100;
			$output['txtQ100'] = $row->txtQ100;
			$output['txtU100'] = $row->txtU100;

			$output['cboCorporate'] = $row->cboCorporate;
			$output['txtCorporate'] = $row->txtCorporate;
			$output['txtB110'] = $row->txtB110;
			$output['txtC110'] = $row->txtC110;
			$output['txtD110'] = $row->txtD110;
			$output['txtN110'] = $row->txtN110;

			$output['cboPersonal700'] = $row->cboPersonal700;
			$output['txtPersonal700'] = $row->txtPersonal700;
			$output['txtB700'] = $row->txtB700;
			$output['txtC700'] = $row->txtC700;
			$output['txtE700'] = $row->txtE700;
			$output['txtD700'] = $row->txtD700;
			$output['txtQ700'] = $row->txtQ700;
			$output['txtU700'] = $row->txtU700;

			$output['cboCorporate710'] = $row->cboCorporate710;
			$output['txtCorporate710'] = $row->txtCorporate710;
			$output['txtB710'] = $row->txtB710;
			$output['txtC710'] = $row->txtC710;
			$output['txtD710'] = $row->txtD710;

			$output['txtTitle'] = $row->txtTitle;  
			$output['txtRmndrTitle'] = $row->txtRmndrTitle;  
			$output['txtStmntRspnsblty'] = $row->txtStmntRspnsblty;  

			$output['txtEdition'] = $row->txtEdition;
			$output['txtRmndrEdtnStmnt'] = $row->txtRmndrEdtnStmnt;

			$output['cboImprint'] = $row->cboImprint;  
			$output['cboImprintType'] = $row->cboImprintType;  
			$output['txtPublisher'] = $row->txtPublisher;  
			$output['txtPublicationPlace'] = $row->txtPublicationPlace;  
			$output['txtPublicationDate'] = $row->txtPublicationDate;  
			$output['txtExtent'] = $row->txtExtent;  
			$output['txtOtherPhysical'] = $row->txtOtherPhysical;  
			$output['txtDimensions'] = $row->txtDimensions;  
			$output['cboFrequency'] = $row->cboFrequency;  
			$output['txtVolume'] = $row->txtVolume;  
			$output['txtIssueDate'] = $row->txtIssueDate;  
			$output['txtIssueNum'] = $row->txtIssueNum;  
			$output['txtSeriesStatement'] = $row->txtSeriesStatement;  
			$output['txtBibliographicNote'] = $row->txtBibliographicNote;  
			$output['txtAccessionNum'] = $row->txtAccessionNum;
			$output['txtCirculationNum'] = $row->txtCirculationNum;  
			$output['txtCost'] = $row->txtCost;    
			$output['txtDateAcquired'] = $row->txtDateAcquired;  
			$output['cboAcquiMode'] = $row->cboAcquiMode; 
			$output['txtUseRestrictions'] = $row->txtUseRestrictions; 
			$output['txtItemStatus'] = $row->txtItemStatus; 
			$output['txtTempLocation'] = $row->txtTempLocation;  
			$output['txtNonpublic'] = $row->txtNonpublic;  
			$output['txtCopyNum'] = $row->txtCopyNum;  

			$output['cboDay'] = $row->cboDay; 
			$output['cboWeek'] = $row->cboWeek; 
			$output['cboMonth'] = $row->cboMonth; 
			$output['cboQuarter'] = $row->cboQuarter;  
			$output['cboSemiAnnual'] = $row->cboSemiAnnual;  
			$output['txtYear'] = $row->txtYear;  
		}  

		echo json_encode($output);  
	}

	// Delete record
	public function delete($id)
	{
		$acquisition_record = array
		(
			'isDeleted' => 1,
			'isActive' => 0
		);

		$this->Acquisition_model->delete_acquisition($id, $acquisition_record);
		$this->Acquisition_model->delete_holdingscopy($id, $acquisition_record);
		echo json_encode(array("status" => TRUE));
	}

	// Entry validation
	public function validate_data()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$ids = array('txtCirculationNum');
		$errors = array('Circulation Number');  

		$ids[] = "txtAccessionNum";
		$errors[] = "Accession Number"; 

		if($this->input->post('cboMaterialType') != "2")
		{

			if($this->input->post('chktag') != "")
			{
				if(substr(implode(', ', $this->input->post('chktag')), 0) == "100")
				{
					$ids[] = "txtPersonal";
					$errors[] = "Personal Name";
				}

				if(substr(implode(', ', $this->input->post('chktag')), 0) == "110")
				{
					$ids[] = "txtCorporate";
					$errors[] = "Corporate name or jurisdiction name as entry element";
				}

				if(substr(implode(', ', $this->input->post('chktag')), 0) == "100, 110")
				{
					$ids[] = "txtPersonal";
					$errors[] = "Personal Name";
					$ids[] = "txtCorporate";
					$errors[] = "Corporate name or jurisdiction name as entry element";
				}

				if($this->input->post('chkPersonal700') == "1")
				{
					$ids[] = "txtPersonal700";
					$errors[] = "Personal Name";
				}

				if($this->input->post('chkCorporate710') == "1")
				{
					$ids[] = "txtCorporate710";
					$errors[] = "Corporate name or jurisdiction name as entry element";
				}
			}

			$ids[] = "txtTitle";
			$errors[] = "Title";
		}

		if($this->input->post('cboMaterialType') == "2")
		{
			$ids[] = "txtSeriesStmnt";
			$errors[] = "Series Statement";
		}

		    // $ids[] = "txtDateAcquired";
		    // $errors[] = "   Date Acquired";

		if($this->input->post('cboAcquiMode') == "1")
		{
			$ids[] = "txtCost";
			$errors[] = "Cost";
		}

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == ''){
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE){
			echo json_encode($data);
			exit();
		}
	}

	public function create_log($id, $acquiID)
	{
		$acquisitionholdings_id = '';

		if($id == 3 || $id == 2)
		{
			$acquisitionholdings_id = $this->input->post('txtAcquisitionID');
		}

		if($id == 1)
		{
			$acquisitionholdings_id = $acquiID;
		}

		$log_record = array
		(
			'ID' => $acquisitionholdings_id,
			'Username' => $this->Accounts_model->get_session_data('UserName'),
			'Module' => 'Acquisition',
			'ModuleFeature' => 'New Acquisition',
			'Transaction' => $id,
			'IP' => $this->input->ip_address()
		);

		$this->Acquisition_model->create_log($log_record);
	}

	// Auto complete for txtTitle
	public function autocomplete_title()
	{
		$arr_result = array();
		$data = $this->Acquisition_model->load_autocomplete_title($_GET['term']); 
		foreach($data as $row)
			$arr_result[] = $row->title;
		echo json_encode($arr_result);
	}

	// Auto complete for txtPersonal
	public function autocomplete_personal()
	{
		$arr_result = array();
		$data = $this->Acquisition_model->load_autocomplete_personal($_GET['term']); 
		foreach($data as $row)
			$arr_result[] = $row->author;
		echo json_encode($arr_result);
	}

	// Auto complete for txtPersonal700
	public function autocomplete_personal700()
	{
		$arr_result = array();
		$data = $this->Acquisition_model->load_autocomplete_personal700($_GET['term']); 
		foreach($data as $row)
			$arr_result[] = $row->author;
		echo json_encode($arr_result);
	}

	// Auto complete for txtPersonal
	public function autocomplete_corporate()
	{
		$arr_result = array();
		$data = $this->Acquisition_model->load_autocomplete_corporate($_GET['term']); 
		foreach($data as $row)
			$arr_result[] = $row->author;
		echo json_encode($arr_result);
	}

	// Auto complete for txtPersonal700
	public function autocomplete_corporate710()
	{
		$arr_result = array();
		$data = $this->Acquisition_model->load_autocomplete_corporate710($_GET['term']); 
		foreach($data as $row)
			$arr_result[] = $row->author;
		echo json_encode($arr_result);
	}

	public function authordetails()
	{
		$output = array();  

		$data = $this->Acquisition_model->load_authordetails($_POST["author"], $_POST["id"]); 

		foreach($data as $row)  
		{ 
			if($_POST["id"] == 'txtPersonal')
			{
				$output['txtB100'] = $row->txtB100;
				$output['txtC100'] = $row->txtC100;
				$output['txtE100'] = $row->txtE100;
				$output['txtD100'] = $row->txtD100;
				$output['txtQ100'] = $row->txtQ100;
				$output['txtU100'] = $row->txtU100;
			}

			if($_POST["id"] == 'txtCorporate')
			{
				$output['txtB110'] = $row->txtB110;
				$output['txtC110'] = $row->txtC110;
				$output['txtD110'] = $row->txtD110;
				$output['txtN110'] = $row->txtN110;
			}

			if($_POST["id"] == 'txtPersonal700')
			{
				$output['txtB700'] = $row->txtB700;
				$output['txtC700'] = $row->txtC700;
				$output['txtE700'] = $row->txtE700;
				$output['txtD700'] = $row->txtD700;
				$output['txtQ700'] = $row->txtQ700;
				$output['txtU700'] = $row->txtU700;
			}

			if($_POST["id"] == 'txtCorporate700')
			{
				$output['txtB710'] = $row->txtB710;
				$output['txtC710'] = $row->txtC710;
				$output['txtD710'] = $row->txtD710;
			}
		}  

		echo json_encode($output);  
	}

	public function autoload_fields()
	{
		$output = array(); 

		$data = $this->Acquisition_model->load_autoloadfields($_POST["title"], $_POST["author"], $_POST["pubyear"]); 
		
		foreach($data as $row)  
		{ 
			$output['txtHoldingsID'] = $row->txtHoldingsID;  
			$output['txtAcquisitionID'] = $row->txtAcquisitionID;  
      		//$output['copy_num'] = $row->copy_num;  

			$output['cboMaterialType'] = $row->cboMaterialType;  
			$output['txtISBN'] = $row->txtISBN; 
			$output['txtISSN'] = $row->txtISSN; 

			$output['txtClassificationNum'] = $row->txtClassificationNum;
			$output['txtAuthorNum'] = $row->txtAuthorNum;
			$output['txtCopyrightDate'] = $row->txtCopyrightDate; 

			$output['txtRmndrTitle'] = $row->txtRmndrTitle;  
			$output['txtStmntRspnsblty'] = $row->txtStmntRspnsblty;  

			$output['txtEdition'] = $row->txtEdition;
			$output['txtRmndrEdtnStmnt'] = $row->txtRmndrEdtnStmnt;

			$output['cboImprint'] = $row->cboImprint;  
			$output['cboImprintType'] = $row->cboImprintType;  
			$output['txtPublicationPlace'] = $row->txtPublicationPlace;  
			$output['txtPublisher'] = $row->txtPublisher;  
			$output['txtPublicationDate'] = $row->txtPublicationDate;  

			$output['txtExtent'] = $row->txtExtent;  
			$output['txtOtherPhysical'] = $row->txtOtherPhysical;  
			$output['txtDimensions'] = $row->txtDimensions;  

			$output['cboFrequency'] = $row->cboFrequency;  
			$output['txtVolume'] = $row->txtVolume;  
			$output['txtIssueDate'] = $row->txtIssueDate;  
			$output['txtIssueNum'] = $row->txtIssueNum; 

			$output['txtSeriesStatement'] = $row->txtSeriesStatement;  
			$output['txtBibliographicNote'] = $row->txtBibliographicNote;  
			$output['txtAccessionNum'] = $row->txtAccessionNum;
			$output['txtCirculationNum'] = $row->txtCirculationNum;  
			$output['txtCost'] = $row->txtCost;    
			$output['txtDateAcquired'] = $row->txtDateAcquired;  
			$output['cboAcquiMode'] = $row->cboAcquiMode; 
			$output['txtSource'] = $row->txtSource;
			$output['txtUseRestrictions'] = $row->txtUseRestrictions; 
			$output['txtItemStatus'] = $row->txtItemStatus; 
			$output['txtTempLocation'] = $row->txtTempLocation;  
			$output['txtNonpublic'] = $row->txtNonpublic;  

			$output['cboDay'] = $row->cboDay;
			$output['cboWeek'] = $row->cboWeek;
			$output['cboMonth'] = $row->cboMonth;
			$output['cboQuarter'] = $row->cboQuarter;
			$output['cboSemiAnnual'] = $row->cboSemiAnnual;
			$output['txtYear'] = $row->txtYear;  
		}  

		echo json_encode($output);  
	}

	function relax() 
	{
		;
	}
}