<?php
class Analytics_controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();   
		$this->load->model("Analytics_model");
	} 

	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['serials'] = $this->Analytics_model->get_serial();
		$data['volumes'] = $this->Analytics_model->get_volume();
		$data['issues'] = $this->Analytics_model->get_issue();
		$data['locations'] = $this->Analytics_model->get_locations();
		$data['analytics'] = $this->Analytics_model->get_analytics();
		$data['languages'] = $this->Analytics_model->get_languages();
		$data['broadclasses'] = $this->Analytics_model->get_broadclasses();
		$data['mediaterms'] = $this->Analytics_model->get_mediaterms();
		$data['mediacodes'] = $this->Analytics_model->get_mediacodes();
		$data['materialtypes'] = $this->Analytics_model->get_materialtypes();

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

		$this->load->template('holdings/analytics', $data, $page);
	}

	public function qwe()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['id'] = $this->session->userdata('id');

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

		$this->load->template('holdings/qwe', $data, $page);
	}

	public function set_id()
	{
		$this->load->library('session');
		$this->session->set_userdata('id', $_POST['id']);
		echo json_encode(array("status" => TRUE));
	}

	public function load_serials()
	{
		$data['serials'] = $this->Analytics_model->get_serial2($_POST['title']);
		$data['volumes'] = $this->Analytics_model->get_volume();
		$data['issues'] = $this->Analytics_model->get_issue();
		$data['analytics'] = $this->Analytics_model->get_analytics();

		// $sc = '';
		// $vc = '';

		// foreach ($data['serials'] as $serial) {

		//     foreach ($data['volumes'] as $volume) {
		//     	if($serial['HoldingsID'] == $volume['HoldingsID'])
		//     	{
		//     		$vc .= '
		//     		<li class="treeview">
		// 				<a href="#" class="texts"><i class="fa fa-circle-o"></i> <span>Volume '.$volume["Volume"].'</span>
		// 					<span class="pull-right-container">
		// 						<i class="fa fa-angle-left pull-right"></i>
		// 					</span>
		// 				</a>
		// 				<ul class="treeview-menu '.$serial["HoldingsID"].'" style="background: #fff">
		// 				</ul>

		// 			</li>
		//     		';
		//     	}
		//     }
		// }

		// foreach ($data['serials'] as $serial) {
		//     $sc .= '
		// 		<li class="treeview">
		// 			<a href="#" class="texts" style="background: #fff">
		// 				<i class="fa fa-book"></i> <span >'.$serial["Title"].'</span>
		// 			</a>
		// 			<ul class="treeview-menu '.$serial["HoldingsID"].'" style="background: #fff;">'.$vc.'
		// 			</ul>
		// 		</li>
		// 	';
		// }

		// $data['append'] = $sc;
		echo json_encode($data);
	}

	public function load_volume_dropdown()
	{
		$data = $this->Analytics_model->get_volume_dropdown($_POST['id']);
		echo json_encode($data);
	}

	public function load_issue_dropdown()
	{
		$data = $this->Analytics_model->get_issue_dropdown($_POST['id'], $_POST['vol']);
		echo json_encode($data);
	}

	public function load_location_dropdown()
	{
		$data = $this->Analytics_model->get_locations();
		echo json_encode($data);
	}

	public function load_analytics()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_analytics($_POST['holdingsid'], $_POST['volume'], $_POST['issuenum']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array['Title'] = '<a type="text" onclick="edit_record('."'".$r->AnalyticsID."'".')">'."".$r->Title."".'</a>';
			$sub_array['Author'] = '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#mdlAuthor" onclick="edit_authors('."'".$r->AnalyticsID."'".')"> Edit Author</a>';
			$sub_array['Subject'] = '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#mdlSubject" onclick="edit_subjects('."'".$r->AnalyticsID."'".')"> Edit Subject</a>';
			$sub_array['Attachments'] = '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#mdlAttachments" onclick="edit_attachments('."'".$r->AnalyticsID."'".')"> Edit Attachments</a>';
			$sub_array['Qwe'] = '<button type="button" class="btn btn-block btn-success btn-xs" onclick="qwe('."'".$r->AnalyticsID."'".')"> Edit QWE</a>';

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_viewall()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_viewall($_POST['holdingsid']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array['Volume'] = $r->Volume;
			$sub_array['Issue'] = $r->IssueNumber;
			$sub_array['Title'] = $r->Title;

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_authors()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_authors($_POST['id']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array['AuthorID'] = '<a type="text" onclick="edit_author('."'".$r->AuthorID."'".','."'".$r->AuthorTag."'".')">'."".$r->AuthorID."".'</a>';
			$sub_array['AuthorTag'] = $r->AuthorTag;
			$sub_array['AuthorName'] = $r->AuthorName;

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_subjects()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_subjects($_POST['id']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array['SubjectID'] = '<a type="text" onclick="edit_subject('."'".$r->SubjectID."'".','."'".$r->SubjectType."'".')">'."".$r->SubjectID."".'</a>';
			$sub_array['SubjectType'] = $r->SubjectType;
			$sub_array['Subject'] = $r->Subject;

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_attachments()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_attachments($_POST['id']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$permission = array();

			$sub_array['MultimediaID'] = $r->MultimediaID;
			$sub_array['FileName'] = $r->FileName;
			$sub_array['FileType'] = $r->FileType;
			$sub_array['FileLocation'] = $r->FileLocation;

			$sub_array['Attachment'] = '<a href="'.base_url().$r->FileLocation.'" target="_blank"> <i class= "fa fa-file-pdf-o"></i></a>';

			$sub_array['Action'] = '<a type="button"  onclick="delete_attachment('."'".$r->MultimediaID."'".')" class="btn btn-danger btn-xs">Delete</a>';

			$permission[] = $r->Permission;

			if(in_array(1,$permission))
			{
			$sub_array['Restricted'] = '<input id="chkPermission"   onclick="save_permission('."'".$r->MultimediaID."'".')" type="checkbox" checked > ';
			}
			else
			{
			$sub_array['Restricted'] = '<input id="chkPermission" type="checkbox" onclick="save_permission('."'".$r->MultimediaID."'".')">  ';
			}

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_locations()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Analytics_model->load_locations();

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = $r->LocationID;
			$sub_array[] = '<a type="text" onclick="edit_location('."'".$r->LocationID."'".')">'."".$r->Location."".'</a>';

			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function create_record()
	{
		$validation = $this->validate_data("Analytics");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$ids = $this->Analytics_model->get_analytics_ids($this->input->post('Journal'), $this->input->post('cboVolume'), $this->input->post('cboIssueNo'));

			$this->input->post('txtClassificationNum') == '' ? $ClassNum = '' : $ClassNum = '$a' . $this->input->post('txtClassificationNum');
			$this->input->post('txtAuthorNum') == '' ? $AuthorNum = '' : $AuthorNum = '$b' . $this->input->post('txtAuthorNum');
			$this->input->post('txtPublicationDate') == '' ? $PubDate = '' : $PubDate = '$c' . $this->input->post('txtPublicationDate');

			$this->input->post('txtTitle') == '' ? $Title = '' : $Title = '$a' . $this->input->post('txtTitle');
			$this->input->post('txtRmndrTitle') == '' ? $RmndrTitle = '' : $RmndrTitle = '$b' . $this->input->post('txtRmndrTitle');
			$this->input->post('txtStmntRspnsblty') == '' ? $sStmntRspnsblty = '' : $sStmntRspnsblty = '$c' . $this->input->post('txtStmntRspnsblty');

			$this->input->post('txtExtent') == '' ? $Extent = '' : $Extent = '$a' . $this->input->post('txtExtent');
			$this->input->post('txtOtherPhysical') == '' ? $OtherPhysicalDtl = '' : $OtherPhysicalDtl = '$b' . $this->input->post('txtOtherPhysical');
			// $this->input->post('txtDimensions') == '' ? $Dimensions = '' : $Dimensions = '$c' . $this->input->post('txtDimensions');

			$CallNum = "";
			$TitleStatement = "";
			$PhysicalDescription = "";

			if($ClassNum != "" || $AuthorNum != "" || $PubDate != "")
				$CallNum = '050##' . $ClassNum . $AuthorNum . $PubDate;

			if($Title != "" || $RmndrTitle != "" || $sStmntRspnsblty != "") 
				$TitleStatement = '24500' . $Title . $RmndrTitle . $sStmntRspnsblty;

			if($Extent != "" || $OtherPhysicalDtl != "")
				$PhysicalDescription = '300##' . $Extent . $OtherPhysicalDtl;

			$catalognum = $this->Analytics_model->generate_catalognum();

			$analytics_record = array
			(
				'HoldingsID' => $ids->HoldingsID,
				'HoldingsCopyID' => $ids->HoldingsCopyID,
				'CatalogNumber' => $catalognum->catnum,
				'CatalogSource' => $this->input->post('txtCatSource'),
				'CatalogDate' => date('Y-m-d'),
				'LanguageID' => $this->input->post('cboLanguage'),
				'BroadClassID' => $this->input->post('cboBroadClass'),
				'CallNumber' => $CallNum,
				'Title' => $TitleStatement,
				'PhysicalDescription' => $PhysicalDescription,
				'MediaTypeID' => $this->input->post('cboMTTerm'),
				'MediaTypeSource' => $this->input->post('txtMTSource'),
				'Location' => $this->input->post('cboLocation'),
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			echo json_encode($this->Analytics_model->create_analytics($analytics_record));
		}
	}

	public function create_author()
	{
		$validation = $this->validate_data("Author");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$authorname = '';

			if($this->input->post('cboAuthor') == "100")
			{
				$this->input->post('txt100a') == '' ? $txt100a = '' : $txt100a = '$a' . $this->input->post('txt100a');
				$this->input->post('txt100b') == '' ? $txt100b = '' : $txt100b = '$b' . $this->input->post('txt100b');
				$this->input->post('txt100c') == '' ? $txt100c = '' : $txt100c = '$c' . $this->input->post('txt100c');
				$this->input->post('txt100e') == '' ? $txt100e = '' : $txt100e = '$e' . $this->input->post('txt100e');
				$this->input->post('txt100d') == '' ? $txt100d = '' : $txt100d = '$d' . $this->input->post('txt100d');
				$this->input->post('txt100q') == '' ? $txt100q = '' : $txt100q = '$q' . $this->input->post('txt100q');
				$this->input->post('txt100u') == '' ? $txt100u = '' : $txt100u = '$u' . $this->input->post('txt100u');

				$authorname = '100' . $this->input->post('cbo100') . '#' . $txt100a . $txt100b . $txt100c . $txt100e . $txt100d . $txt100q . $txt100u;
			}
			
			if($this->input->post('cboAuthor') == "110")
			{
				$this->input->post('txt110a') == '' ? $txt110a = '' : $txt110a = '$a' . $this->input->post('txt110a');
				$this->input->post('txt110b') == '' ? $txt110b = '' : $txt110b = '$b' . $this->input->post('txt110b');
				$this->input->post('txt110c') == '' ? $txt110c = '' : $txt110c = '$c' . $this->input->post('txt110c');
				$this->input->post('txt110d') == '' ? $txt110d = '' : $txt110d = '$d' . $this->input->post('txt110d');
				$this->input->post('txt110n') == '' ? $txt110n = '' : $txt110n = '$n' . $this->input->post('txt110n');

				$authorname = '110' . $this->input->post('cbo110') . '#' . $txt110a . $txt110b . $txt110c . $txt110d . $txt110n;
			}

			if($this->input->post('cboAuthor') == "700")
			{
				$this->input->post('txt700a') == '' ? $txt700a = '' : $txt700a = '$a' . $this->input->post('txt700a');
				$this->input->post('txt700b') == '' ? $txt700b = '' : $txt700b = '$b' . $this->input->post('txt700b');
				$this->input->post('txt700c') == '' ? $txt700c = '' : $txt700c = '$c' . $this->input->post('txt700c');
				$this->input->post('txt700e') == '' ? $txt700e = '' : $txt700e = '$e' . $this->input->post('txt700e');
				$this->input->post('txt700d') == '' ? $txt700d = '' : $txt700d = '$d' . $this->input->post('txt700d');
				$this->input->post('txt700q') == '' ? $txt700q = '' : $txt700q = '$q' . $this->input->post('txt700q');
				$this->input->post('txt700u') == '' ? $txt700u = '' : $txt700u = '$u' . $this->input->post('txt700u');

				$authorname = '700' . $this->input->post('cbo700') . '#' . $txt700a . $txt700b . $txt700c . $txt700e . $txt700d . $txt700q . $txt700u;
			}

			if($this->input->post('cboAuthor') == "710")
			{
				$this->input->post('txt710a') == '' ? $txt710a = '' : $txt710a = '$a' . $this->input->post('txt710a');
				$this->input->post('txt710b') == '' ? $txt710b = '' : $txt710b = '$b' . $this->input->post('txt710b');
				$this->input->post('txt710c') == '' ? $txt710c = '' : $txt710c = '$c' . $this->input->post('txt710c');
				$this->input->post('txt710d') == '' ? $txt710d = '' : $txt710d = '$d' . $this->input->post('txt710d');

				$authorname = '710' . $this->input->post('cbo710') . '#' . $txt710a . $txt710b . $txt710c . $txt710d;
			}

			$author_record = array
			(
				'HoldingsID' => $this->input->post('txtAnalyticsID'),
				'AuthorTag' => $this->input->post('cboAuthor'),
				'AuthorName' => $authorname,
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			echo json_encode($this->Analytics_model->create_author($author_record));
		}
	}

	public function create_subject()
	{
		$validation = $this->validate_data("Subject");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$subject = '';

			if($this->input->post('cboSubject') == "600")
			{
				$this->input->post('txt600a') == '' ? $txt600a = '' : $txt600a = '$a' . $this->input->post('txt600a');
				$this->input->post('txt600c') == '' ? $txt600c = '' : $txt600c = '$c' . $this->input->post('txt600c');
				$this->input->post('txt600x') == '' ? $txt600x = '' : $txt600x = '$x' . $this->input->post('txt600x');
				$this->input->post('txt600v') == '' ? $txt600v = '' : $txt600v = '$v' . $this->input->post('txt600v');
				$this->input->post('txt600y') == '' ? $txt600y = '' : $txt600y = '$y' . $this->input->post('txt600y');
				$this->input->post('txt600z') == '' ? $txt600z = '' : $txt600z = '$z' . $this->input->post('txt600z');

				$subject = '600' . $this->input->post('cbo600') . '#' . $txt600a . $txt600c . $txt600x . $txt600v . $txt600y . $txt600z;
			}
			
			if($this->input->post('cboSubject') == "610")
			{
				$this->input->post('txt610a') == '' ? $txt610a = '' : $txt610a = '$a' . $this->input->post('txt610a');
				$this->input->post('txt610b') == '' ? $txt610b = '' : $txt610b = '$b' . $this->input->post('txt610b');
				$this->input->post('txt610x') == '' ? $txt610x = '' : $txt610x = '$x' . $this->input->post('txt610x');
				$this->input->post('txt610v') == '' ? $txt610v = '' : $txt610v = '$v' . $this->input->post('txt610v');
				$this->input->post('txt610y') == '' ? $txt610y = '' : $txt610y = '$y' . $this->input->post('txt610y');
				$this->input->post('txt610z') == '' ? $txt610z = '' : $txt610z = '$z' . $this->input->post('txt610z');

				$subject = '610' . $this->input->post('cbo610') . '#' . $txt610a . $txt610b . $txt610x . $txt610v . $txt610y . $txt610z;
			}

			if($this->input->post('cboSubject') == "611")
			{
				$this->input->post('txt611a') == '' ? $txt611a = '' : $txt611a = '$a' . $this->input->post('txt611a');
				$this->input->post('txt611d') == '' ? $txt611d = '' : $txt611d = '$d' . $this->input->post('txt611d');
				$this->input->post('txt611c') == '' ? $txt611c = '' : $txt611c = '$c' . $this->input->post('txt611c');

				$subject = '611' . $this->input->post('cbo611') . '#' . $txt611a . $txt611d . $txt611c;
			}

			if($this->input->post('cboSubject') == "630")
			{
				$this->input->post('txt630a') == '' ? $txt630a = '' : $txt630a = '$a' . $this->input->post('txt630a');
				$this->input->post('txt630x') == '' ? $txt630x = '' : $txt630x = '$x' . $this->input->post('txt630x');
				$this->input->post('txt630v') == '' ? $txt630v = '' : $txt630v = '$v' . $this->input->post('txt630v');

				$subject = '630' . $this->input->post('cbo630') . '#' . $txt630a . $txt630x . $txt630v;
			}

			if($this->input->post('cboSubject') == "650")
			{
				$this->input->post('txt650a') == '' ? $txt650a = '' : $txt650a = '$a' . $this->input->post('txt650a');
				$this->input->post('txt650x') == '' ? $txt650x = '' : $txt650x = '$x' . $this->input->post('txt650x');
				$this->input->post('txt650v') == '' ? $txt650v = '' : $txt650v = '$v' . $this->input->post('txt650v');
				$this->input->post('txt650y') == '' ? $txt650y = '' : $txt650y = '$y' . $this->input->post('txt650y');
				$this->input->post('txt650z') == '' ? $txt650z = '' : $txt650z = '$z' . $this->input->post('txt650z');

				$subject = '650' . $this->input->post('cbo650') . '#' . $txt650a . $txt650x . $txt650v. $txt650y . $txt650z;
			}

			if($this->input->post('cboSubject') == "651")
			{
				$this->input->post('txt651a') == '' ? $txt651a = '' : $txt651a = '$a' . $this->input->post('txt651a');
				$this->input->post('txt651x') == '' ? $txt651x = '' : $txt651x = '$x' . $this->input->post('txt651x');
				$this->input->post('txt651v') == '' ? $txt651v = '' : $txt651v = '$v' . $this->input->post('txt651v');

				$subject = '651' . $this->input->post('cbo651') . '#' . $txt651a . $txt651x . $txt651v;
			}

			$subject_record = array
			(
				'HoldingsID' => $this->input->post('txtAnalyticsID'),
				'SubjectType' => $this->input->post('cboSubject'),
				'Subject' => $subject,
				'intFlag' => 1
				// 'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			echo json_encode($this->Analytics_model->create_subject($subject_record));
		}
	}

	public function create_attachment()
	{
		$dir = './upload/';
		$without_extension = pathinfo(($_FILES["attachment"]["name"]), PATHINFO_FILENAME);
		$ext = pathinfo(($_FILES["attachment"]["name"]),PATHINFO_EXTENSION);
		$clearString =preg_replace("/[^\w- ]/", '',($without_extension), PATHINFO_FILENAME).'_'.$this->input->post('txtAnalyticsID2'); 
		$file = $dir . basename($clearString) .'.' . $ext;
		$fileType = strtolower(pathinfo(($without_extension),PATHINFO_EXTENSION));

		if($ext != "jpg" && $ext != "JPG" && $ext != "png" && $ext != "PNG" && $ext != "jpeg" && $ext != "JPEG" && $ext != "pdf" && $ext != "PDF" && $ext != "avi" && $ext != "AVI")
		{
			$type = 0;
		}

		else
		{
			$type = 1;
		}


		if ($_FILES["attachment"]["size"] > 8e+7)
		{
			$size = 0;
		}
		else
		{
			$size = 1;	
		}

		// print_r($type);
		// print_r($size);

		if($type == 1 && $size == 1 )
		{
			if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $file))
			{

				$FileName=	$clearString;
				$FileType=  $ext;
				$FileLocation= $file;
				$HoldingsID = $this->input->post('txtAnalyticsID2');

				//if multimedia ID already exist, the file will inherit the existing ID.
				if($this->input->post('txtMultimediaID') != '')
				{
					$multimedia_id = $this->input->post('txtMultimediaID');
				}

				$multimedia_record = array
				( 
					'HoldingsID'      => $HoldingsID,
					'FileName'        => $FileName,
					'FileType'        => $FileType,
					'FileLocation'    => $FileLocation,
					'Permission'      => $this->input->post('chkRestriction')
				);

				if($this->input->post('txtMultimediaID') == "")
				{
					echo json_encode($this->Analytics_model->create_multimedia($multimedia_record));
				}
			}
		}
		else
		{
			echo json_encode(array(
				'status'  => 'error',
				'message' => 'Unable to upload file.'
			));
		}
	}

	public function create_location()
	{
		$validation = $this->validate_data("Location");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$location_record = array
			(
				'Location' => $this->input->post('txtLocation'),
				'MaterialTypeID' => $this->input->post('cboMaterialType'),
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			echo json_encode($this->Analytics_model->create_location($location_record));
		}
	}

	public function update_record()
	{
		$validation = $this->validate_data("Analytics");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$this->input->post('txtClassificationNum') == '' ? $ClassNum = '' : $ClassNum = '$a' . $this->input->post('txtClassificationNum');
			$this->input->post('txtAuthorNum') == '' ? $AuthorNum = '' : $AuthorNum = '$b' . $this->input->post('txtAuthorNum');
			$this->input->post('txtPublicationDate') == '' ? $PubDate = '' : $PubDate = '$c' . $this->input->post('txtPublicationDate');

			$this->input->post('txtTitle') == '' ? $Title = '' : $Title = '$a' . $this->input->post('txtTitle');
			$this->input->post('txtRmndrTitle') == '' ? $RmndrTitle = '' : $RmndrTitle = '$b' . $this->input->post('txtRmndrTitle');
			$this->input->post('txtStmntRspnsblty') == '' ? $sStmntRspnsblty = '' : $sStmntRspnsblty = '$c' . $this->input->post('txtStmntRspnsblty');

			$this->input->post('txtExtent') == '' ? $Extent = '' : $Extent = '$a' . $this->input->post('txtExtent');
			$this->input->post('txtOtherPhysical') == '' ? $OtherPhysicalDtl = '' : $OtherPhysicalDtl = '$b' . $this->input->post('txtOtherPhysical');
			// $this->input->post('txtDimensions') == '' ? $Dimensions = '' : $Dimensions = '$c' . $this->input->post('txtDimensions');

			$CallNum = "";
			$TitleStatement = "";
			$PhysicalDescription = "";

			if($ClassNum != "" || $AuthorNum != "" || $PubDate != "")
				$CallNum = '050##' . $ClassNum . $AuthorNum . $PubDate;

			if($Title != "" || $RmndrTitle != "" || $sStmntRspnsblty != "") 
				$TitleStatement = '24500' . $Title . $RmndrTitle . $sStmntRspnsblty;

			if($Extent != "" || $OtherPhysicalDtl != "")
				$PhysicalDescription = '300##' . $Extent . $OtherPhysicalDtl;

			$analytics_record = array
			(
				'AnalyticsID' => $this->input->post('txtAnalyticsID'),
				'CatalogSource' => $this->input->post('txtCatSource'),
				'LanguageID' => $this->input->post('cboLanguage'),
				'BroadClassID' => $this->input->post('cboBroadClass'),
				'CallNumber' => $CallNum,
				'Title' => $TitleStatement,
				'PhysicalDescription' => $PhysicalDescription,
				'MediaTypeID' => $this->input->post('cboMTTerm'),
				'MediaTypeSource' => $this->input->post('txtMTSource'),
				'Location' => $this->input->post('cboLocation'),
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			echo json_encode($this->Analytics_model->update_analytics($analytics_record));
		}
	}

	public function update_author()
	{
		$validation = $this->validate_data("Author");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$authorname = '';

			if($this->input->post('cboAuthor') == "100")
			{
				$this->input->post('txt100a') == '' ? $txt100a = '' : $txt100a = '$a' . $this->input->post('txt100a');
				$this->input->post('txt100b') == '' ? $txt100b = '' : $txt100b = '$b' . $this->input->post('txt100b');
				$this->input->post('txt100c') == '' ? $txt100c = '' : $txt100c = '$c' . $this->input->post('txt100c');
				$this->input->post('txt100e') == '' ? $txt100e = '' : $txt100e = '$e' . $this->input->post('txt100e');
				$this->input->post('txt100d') == '' ? $txt100d = '' : $txt100d = '$d' . $this->input->post('txt100d');
				$this->input->post('txt100q') == '' ? $txt100q = '' : $txt100q = '$q' . $this->input->post('txt100q');
				$this->input->post('txt100u') == '' ? $txt100u = '' : $txt100u = '$u' . $this->input->post('txt100u');

				$authorname = '100' . $this->input->post('cbo100') . '#' . $txt100a . $txt100b . $txt100c . $txt100e . $txt100d . $txt100q . $txt100u;
			}
			
			if($this->input->post('cboAuthor') == "110")
			{
				$this->input->post('txt110a') == '' ? $txt110a = '' : $txt110a = '$a' . $this->input->post('txt110a');
				$this->input->post('txt110b') == '' ? $txt110b = '' : $txt110b = '$b' . $this->input->post('txt110b');
				$this->input->post('txt110c') == '' ? $txt110c = '' : $txt110c = '$c' . $this->input->post('txt110c');
				$this->input->post('txt110d') == '' ? $txt110d = '' : $txt110d = '$d' . $this->input->post('txt110d');
				$this->input->post('txt110n') == '' ? $txt110n = '' : $txt110n = '$q' . $this->input->post('txt110n');

				$authorname = '110' . $this->input->post('cbo110') . '#' . $txt110a . $txt110b . $txt110c . $txt110d . $txt110n;
			}

			if($this->input->post('cboAuthor') == "700")
			{
				$this->input->post('txt700a') == '' ? $txt700a = '' : $txt700a = '$a' . $this->input->post('txt700a');
				$this->input->post('txt700b') == '' ? $txt700b = '' : $txt700b = '$b' . $this->input->post('txt700b');
				$this->input->post('txt700c') == '' ? $txt700c = '' : $txt700c = '$c' . $this->input->post('txt700c');
				$this->input->post('txt700e') == '' ? $txt700e = '' : $txt700e = '$e' . $this->input->post('txt700e');
				$this->input->post('txt700d') == '' ? $txt700d = '' : $txt700d = '$d' . $this->input->post('txt700d');
				$this->input->post('txt700q') == '' ? $txt700q = '' : $txt700q = '$q' . $this->input->post('txt700q');
				$this->input->post('txt700u') == '' ? $txt700u = '' : $txt700u = '$u' . $this->input->post('txt700u');

				$authorname = '700' . $this->input->post('cbo700') . '#' . $txt700a . $txt700b . $txt700c . $txt700e . $txt700d . $txt700q . $txt700u;
			}

			if($this->input->post('cboAuthor') == "710")
			{
				$this->input->post('txt710a') == '' ? $txt710a = '' : $txt710a = '$a' . $this->input->post('txt710a');
				$this->input->post('txt710b') == '' ? $txt710b = '' : $txt710b = '$b' . $this->input->post('txt710b');
				$this->input->post('txt710c') == '' ? $txt710c = '' : $txt710c = '$c' . $this->input->post('txt710c');
				$this->input->post('txt710d') == '' ? $txt710d = '' : $txt710d = '$d' . $this->input->post('txt710d');

				$authorname = '710' . $this->input->post('cbo710') . '#' . $txt710a . $txt710b . $txt710c . $txt710d . $txt710n;
			}

			$author_record = array
			(
				'AuthorID' => $this->input->post('txtAuthorID'),
				'AuthorTag' => $this->input->post('cboAuthor'),
				'AuthorName' => $authorname,
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			echo json_encode($this->Analytics_model->update_author($author_record));
		}
	}

	public function update_subject()
	{
		$validation = $this->validate_data("Subject");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$subject = '';

			if($this->input->post('cboSubject') == "600")
			{
				$this->input->post('txt600a') == '' ? $txt600a = '' : $txt600a = '$a' . $this->input->post('txt600a');
				$this->input->post('txt600c') == '' ? $txt600c = '' : $txt600c = '$c' . $this->input->post('txt600c');
				$this->input->post('txt600x') == '' ? $txt600x = '' : $txt600x = '$x' . $this->input->post('txt600x');
				$this->input->post('txt600v') == '' ? $txt600v = '' : $txt600v = '$v' . $this->input->post('txt600v');
				$this->input->post('txt600y') == '' ? $txt600y = '' : $txt600y = '$y' . $this->input->post('txt600y');
				$this->input->post('txt600z') == '' ? $txt600z = '' : $txt600z = '$z' . $this->input->post('txt600z');

				$subject = '600' . $this->input->post('cbo600') . '#' . $txt600a . $txt600c . $txt600x . $txt600v . $txt600y . $txt600z;
			}
			
			if($this->input->post('cboSubject') == "610")
			{
				$this->input->post('txt610a') == '' ? $txt610a = '' : $txt610a = '$a' . $this->input->post('txt610a');
				$this->input->post('txt610b') == '' ? $txt610b = '' : $txt610b = '$b' . $this->input->post('txt610b');
				$this->input->post('txt610x') == '' ? $txt610x = '' : $txt610x = '$x' . $this->input->post('txt610x');
				$this->input->post('txt610v') == '' ? $txt610v = '' : $txt610v = '$v' . $this->input->post('txt610v');
				$this->input->post('txt610y') == '' ? $txt610y = '' : $txt610y = '$y' . $this->input->post('txt610y');
				$this->input->post('txt610z') == '' ? $txt610z = '' : $txt610z = '$z' . $this->input->post('txt610z');

				$subject = '610' . $this->input->post('cbo610') . '#' . $txt610a . $txt610b . $txt610x . $txt610v . $txt610y . $txt610z;
			}

			if($this->input->post('cboSubject') == "611")
			{
				$this->input->post('txt611a') == '' ? $txt611a = '' : $txt611a = '$a' . $this->input->post('txt611a');
				$this->input->post('txt611d') == '' ? $txt611d = '' : $txt611d = '$d' . $this->input->post('txt611d');
				$this->input->post('txt611c') == '' ? $txt611c = '' : $txt611c = '$c' . $this->input->post('txt611c');

				$subject = '611' . $this->input->post('cbo611') . '#' . $txt611a . $txt611d . $txt611c;
			}

			if($this->input->post('cboSubject') == "630")
			{
				$this->input->post('txt630a') == '' ? $txt630a = '' : $txt630a = '$a' . $this->input->post('txt630a');
				$this->input->post('txt630x') == '' ? $txt630x = '' : $txt630x = '$x' . $this->input->post('txt630x');
				$this->input->post('txt630v') == '' ? $txt630v = '' : $txt630v = '$v' . $this->input->post('txt630v');

				$subject = '630' . $this->input->post('cbo630') . '#' . $txt630a . $txt630x . $txt630v;
			}

			if($this->input->post('cboSubject') == "650")
			{
				$this->input->post('txt650a') == '' ? $txt650a = '' : $txt650a = '$a' . $this->input->post('txt650a');
				$this->input->post('txt650x') == '' ? $txt650x = '' : $txt650x = '$x' . $this->input->post('txt650x');
				$this->input->post('txt650v') == '' ? $txt650v = '' : $txt650v = '$v' . $this->input->post('txt650v');
				$this->input->post('txt650y') == '' ? $txt650y = '' : $txt650y = '$y' . $this->input->post('txt650y');
				$this->input->post('txt650z') == '' ? $txt650z = '' : $txt650z = '$z' . $this->input->post('txt650z');

				$subject = '650' . $this->input->post('cbo650') . '#' . $txt650a . $txt650x . $txt650v. $txt650y . $txt650z;
			}

			if($this->input->post('cboSubject') == "651")
			{
				$this->input->post('txt651a') == '' ? $txt651a = '' : $txt651a = '$a' . $this->input->post('txt651a');
				$this->input->post('txt651x') == '' ? $txt651x = '' : $txt651x = '$x' . $this->input->post('txt651x');
				$this->input->post('txt651v') == '' ? $txt651v = '' : $txt651v = '$v' . $this->input->post('txt651v');

				$subject = '651' . $this->input->post('cbo651') . '#' . $txt651a . $txt651x . $txt651v;
			}

			$subject_record = array
			(
				'HoldingsID' => $this->input->post('txtAnalyticsID'),
				'SubjectID' => $this->input->post('txtSubjectID'),
				'SubjectType' => $this->input->post('cboSubject'),
				'Subject' => $subject,
				'intFlag' => 1
				// 'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			echo json_encode($this->Analytics_model->update_subject($subject_record));
		}
	}

	public function update_attachment()
	{
		$output =  array();
		$data = $this->Analytics_model->get_attachment($_POST["id"]);

		foreach($data as $row)
		{
			$output['UploadName'] = $row->FileName;
			$output['Restrict'] = $row->Permission;
			$current_Permission = $row->Permission;
		}

		if($current_Permission == 1)
		{
			$Restriction = 0;
			$this->Analytics_model->update_permission($_POST["id"], $Restriction);
		}
		else 
		{
			$Restriction = 1;
			$this->Analytics_model->update_permission($_POST["id"], $Restriction);
		}

		$this->create_log($output['UploadName'] . "*2");
		echo json_encode($output);
	}

	public function update_location()
	{
		$validation = $this->validate_data("Location");

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$location_record = array
			(
				'LocationID' => $this->input->post('txtLocationID'),
				'Location' => $this->input->post('txtLocation'),
				'MaterialTypeID' => $this->input->post('cboMaterialType'),
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')

			);

			echo json_encode($this->Analytics_model->update_location($location_record));
		}
	}

	public function get_analytic()
	{
		$output = array();

		$data = $this->Analytics_model->get_analytic($_POST["id"]);
		
		foreach($data as $row)
		{
			$output['AnalyticsID'] = $row->AnalyticsID;
			$output['HoldingsID'] = $row->HoldingsID;   
			$output['Volume'] = $row->Volume;   
			$output['IssueNumber'] = $row->IssueNumber; 
			$output['CatalogSource'] = $row->CatalogSource; 
			$output['LanguageID'] = $row->LanguageID; 
			$output['BroadClassID'] = $row->BroadClassID; 
			$output['ClassNum'] = $row->ClassNum; 
			$output['AuthorNum'] = $row->AuthorNum;  
			$output['PubDate'] = $row->PubDate; 
			$output['Title'] = $row->Title; 
			$output['RmndrTitle'] = $row->RmndrTitle; 
			$output['StmntRspnsblty'] = $row->StmntRspnsblty;
			$output['Extent'] = $row->Extent;
			$output['OtherPhysical'] = $row->OtherPhysical;
			// $output['Dimensions'] = $row->Dimensions;
			$output['MediaTypeID'] = $row->MediaTypeID; 
			$output['MediaTypeSource'] = $row->MediaTypeSource; 
			$output['Location'] = $row->Location;
		}

		echo json_encode($output);  
	}

	public function get_author()
	{
		$output = array();

		$data = $this->Analytics_model->get_author($_POST["id"], $_POST["type"]);
		
		foreach($data as $row)
		{
			$output['txtAnalyticsID'] = $row->txtAnalyticsID;
			$output['txtAuthorID'] = $row->txtAuthorID;
			$output['cboAuthor'] = $row->cboAuthor; 

			if($_POST["type"] == "100")
			{
				$output['cbo100'] = $row->cbo100;   
				$output['txt100a'] = $row->txt100a;  
				$output['txt100b'] = $row->txt100b; 
				$output['txt100c'] = $row->txt100c;  
				$output['txt100e'] = $row->txt100e;
				$output['txt100d'] = $row->txt100d;
				$output['txt100q'] = $row->txt100q;
				$output['txt100u'] = $row->txt100u;
			}
			
			if($_POST["type"] == "110")
			{
				$output['cbo110'] = $row->cbo110;   
				$output['txt110a'] = $row->txt110a;  
				$output['txt110b'] = $row->txt110b; 
				$output['txt110c'] = $row->txt110c;  
				$output['txt110d'] = $row->txt110d;
				$output['txt110n'] = $row->txt110n;
			}
			
			if($_POST["type"] == "700")
			{
				$output['cbo700'] = $row->cbo700;   
				$output['txt700a'] = $row->txt700a;  
				$output['txt700b'] = $row->txt700b; 
				$output['txt700c'] = $row->txt700c;  
				$output['txt700e'] = $row->txt700e;
				$output['txt700d'] = $row->txt700d;
				$output['txt700q'] = $row->txt700q;
				$output['txt700u'] = $row->txt700u;
			}
			
			if($_POST["type"] == "710")
			{
				$output['cbo710'] = $row->cbo710;   
				$output['txt710a'] = $row->txt710a;  
				$output['txt710b'] = $row->txt710b; 
				$output['txt710c'] = $row->txt710c;  
				$output['txt710d'] = $row->txt710d;
			}
		}

		echo json_encode($output);  
	}

	public function get_subject()
	{
		$output = array();

		$data = $this->Analytics_model->get_subject($_POST["id"], $_POST["type"]);
		
		foreach($data as $row)
		{
			$output['txtAnalyticsID'] = $row->txtAnalyticsID;
			$output['txtSubjectID'] = $row->txtSubjectID;
			$output['cboSubject'] = $row->cboSubject; 

			if($_POST["type"] == "600")
			{
				$output['txt600a'] = $row->txt600a;  
				$output['txt600c'] = $row->txt600c;  
				$output['txt600x'] = $row->txt600x;
				$output['txt600v'] = $row->txt600v;
				$output['txt600y'] = $row->txt600y;
				$output['txt600z'] = $row->txt600z;
			}
			
			if($_POST["type"] == "610")
			{
				$output['txt610a'] = $row->txt610a;  
				$output['txt610b'] = $row->txt610b;  
				$output['txt610x'] = $row->txt610x;
				$output['txt610v'] = $row->txt610v;
				$output['txt610y'] = $row->txt610y;
				$output['txt610z'] = $row->txt610z;
			}
			
			if($_POST["type"] == "611")
			{
				$output['txt611a'] = $row->txt611a;  
				$output['txt611d'] = $row->txt611d;  
				$output['txt611c'] = $row->txt611c;
			}
			
			if($_POST["type"] == "630")
			{
				$output['txt630a'] = $row->txt630a;  
				$output['txt630x'] = $row->txt630x;  
				$output['txt630v'] = $row->txt630v;
			}

			if($_POST["type"] == "650")
			{
				$output['txt650a'] = $row->txt650a;  
				$output['txt650x'] = $row->txt650x;
				$output['txt650v'] = $row->txt650v;
				$output['txt650y'] = $row->txt650y;
				$output['txt650z'] = $row->txt650z;
			}

			if($_POST["type"] == "651")
			{
				$output['txt651a'] = $row->txt651a;  
				$output['txt651x'] = $row->txt651x;  
				$output['txt651v'] = $row->txt651v;
			}
		}

		echo json_encode($output);  
	}

	public function get_location()
	{
		$output = array();

		$data = $this->Analytics_model->get_location($_POST["id"]);
		
		foreach($data as $row)
		{
			$output['txtLocationID'] = $row->LocationID;
			$output['txtLocation'] = $row->Location;
			$output['cboMaterialType'] = $row->MaterialTypeID; 
		}

		echo json_encode($output);  
	}

	public function delete_record()
	{
		echo json_encode($this->Analytics_model->delete_record($_POST["id"], $_POST["type"]));
	}

	public function delete_attachment()
	{
		$output =  array();
		$id = $_POST['id'];
		$fulltext = $this->Analytics_model->get_attachment($id);

		foreach($fulltext as $row)  
		{ 
			$output['FileLocation'] = $row->FileLocation;
		}

		$FileLocation = $output['FileLocation'];

		echo json_encode($this->Analytics_model->delete_attachment($id,$FileLocation));
	}

	public function validate_data($record)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = '';

		$ids = array();
		$errors = array();

		if($record == "Analytics")
		{
			$ids[] = 'txtTitle';
			$errors[] = 'Title';
		}  
		else if($record == "Author")
		{
			if($this->input->post('cboAuthor') == "100")
			{
				$ids[] = 'txt100a';
				$errors[] = 'Personal Name';
			}
			
			if($this->input->post('cboAuthor') == "110")
			{
				$ids[] = 'txt110a';
				$errors[] = 'Corporate Name';
			}

			if($this->input->post('cboAuthor') == "700")
			{
				$ids[] = 'txt700a';
				$errors[] = 'Personal Name';
			}

			if($this->input->post('cboAuthor') == "710")
			{
				$ids[] = 'txt710a';
				$errors[] = 'Corporate Name';
			}
		}
		else if($record == "Subject")
		{
			if($this->input->post('cboSubject') == "600")
			{
				$ids[] = 'txt600a';
				$errors[] = 'Personal Name Subject Heading';
			}
			
			if($this->input->post('cboSubject') == "610")
			{
				$ids[] = 'txt610a';
				$errors[] = 'Corporate Name Subject Heading';
			}

			if($this->input->post('cboSubject') == "611")
			{
				$ids[] = 'txt611a';
				$errors[] = 'Meeting/Conference Name Subject Heading';
			}

			if($this->input->post('cboSubject') == "630")
			{
				$ids[] = 'txt630a';
				$errors[] = 'Uniform Title Subject Heading';
			}

			if($this->input->post('cboSubject') == "650")
			{
				$ids[] = 'txt650a';
				$errors[] = 'Topical Term Subject Headisng';
			}

			if($this->input->post('cboSubject') == "651")
			{
				$ids[] = 'txt651a';
				$errors[] = 'Geographic Name Subject Heading';
			}
		}
		else if($record == "Location")
		{
			$ids[] = 'txtLocation';
			$errors[] = 'Location';
		}

		

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '' || $this->input->post($ids[$x])  == 'null'){
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = 'validation error';
			}
		}

		if($data['status'] === 'validation error'){
			return $data;
		}
	}

	public function create_log($fromserver)
	{
		if($fromserver == '0')
		{
			$log_record = array
			(
				'ID' => $this->input->post('txtName'),
				'Username' => $this->Accounts_model->get_session_data('UserName'),
				'Module' => 'Holdings',
				'ModuleFeature' => $this->input->post('modulefeature'),
				'Transaction' => $this->input->post('id'),
				'IP' => $this->input->ip_address()
			);
		}
		else
		{
			$log_record = array
			(
				'ID' => strstr($fromserver, '*', true),
				'Username' => $this->Accounts_model->get_session_data('UserName'),
				'Module' => 'Holdings',
				'ModuleFeature' => "Analytics Attachment",
				'Transaction' => ltrim(strstr($fromserver, '*'),'*'),
				'IP' => $this->input->ip_address()
			);
		}
		
		// print_r($log_record);
		$this->Analytics_model->create_log($log_record);
	}

	function relax()
	{
		;
	}
}