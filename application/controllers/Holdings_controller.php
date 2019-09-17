<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Holdings_controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();   
		$this->load->helper('url');
		$this->load->model("Holdings_model");
		$this->load->model("Reports_model");
	} 

	//holdings home landing page
	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));
		
		$data['roles'] = $this->Accounts_model->get_roles_dropdown();

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

		$this->load->template('holdings/home', $data, $page);
	}

	//redirect to 1.php view for all material types
	public function all()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['types'] = $this->Holdings_model->get_type();

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

		$this->load->template('holdings/1', $data, $page);
	}

	//view for uncatalog
	public function holdingsuncatalogindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = -1;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page);
	}

	//view for catalog materials
	public function holdingscatalogindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 0;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page);    
	}

	//view for publications
	public function publicationsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/publicationsview', $data, $page);    
	}

	//view for holdings copy
	public function holdingscopyindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');
		$data['sources'] = $this->Holdings_model->get_source();
		$data['months'] = $this->Acquisition_model->get_month();
		$data['types'] = $this->Holdings_model->get_type();
		$data['location'] = $this->Holdings_model->get_location();

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/holdingscopyview', $data, $page);    
	}

	//view for books
	public function booksindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 1;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for serials
	public function serialsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 2;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for theses
	public function thesesindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 3;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for non prints
	public function nonprintsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 4;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for Vertical files
	public function verticalfilesindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 5;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for investrigatory projects
	public function investigatoryprojectsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 6;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for technical reports
	public function technicalreportsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 7;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for reprints
	public function reprintsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['types'] = $this->Holdings_model->get_type();
		$data['bclass'] = $this->Holdings_model->get_broadclass();
		$data['language'] = $this->Holdings_model->get_language();
		$data['contenttype'] = $this->Holdings_model->get_contenttype();
		$data['mediatype'] = $this->Holdings_model->get_mediatype();
		$data['carriertype'] = $this->Holdings_model->get_carriertype();
		$data['material'] = 8;

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/1', $data, $page); 
	}

	//view for author
	public function viewauthor()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/authorsview', $data, $page);
	}

	//view for subjects
	public function subjectsindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/subject', $data, $page);
	}

	//view for multimedia/attachments/fulltext
	public function multimediaindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/upload', $data, $page);
	}

	//view for frontpage of all material type other than serials
	public function frontpageindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$var =$this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');
		$data['id'] = $this->session->userdata('id');
		$data['aid'] = "";

		$data['frontpageid'] = $this->Holdings_model->get_frontpageid($var);
		$data1 = $this->Holdings_model->get_frontpage($var);
		$data['frontpage'] ="";

		if($data1 != '')
			$data['frontpage'] = $this->Holdings_model->get_frontpage($var);
		else
			$data['frontpage']=="";

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/frontpage', $data, $page);
	}

	//view for frontpage of all material type other than serials
	public function holdingscopyfrontpageindex()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$var =$this->session->userdata('id');
		$data['id'] = $this->session->userdata('id');
		$data['title'] = $this->session->userdata('title');
		$data['sources'] = $this->Holdings_model->get_source();
		$data['months'] = $this->Acquisition_model->get_month();
		$data['types'] = $this->Holdings_model->get_type();
		$data['location'] = $this->Holdings_model->get_location();

		$data['frontpageid'] = $this->Holdings_model->get_frontpageid($var);
		$data1 = $this->Holdings_model->get_frontpage($var);
		$data['frontpage'] ="";

		if($data1 != '')
			$data['frontpage'] = $this->Holdings_model->get_frontpage($var);
		else
			$data['frontpage']=="";

		$modules = $this->load->disable_modules(explode(',', 
			$this->Accounts_model->get_session_data('ModuleAssignment')), 
		$this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/frontpage', $data, $page);
	}

	//view for frontpage of serials
	public function holdingscopyfrontpageindexforserials()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
			redirect('');

		$var1 =$this->session->userdata('AcquiID');
		$data['aid'] = $this->session->userdata('AcquiID');
		$data['id'] = $this->session->userdata('id');
		$data['frontpageid'] = $this->Holdings_model->get_frontpageid_serials($var1);
		$data1 = $this->Holdings_model->get_frontpage_serials($var1);
		$data['frontpage'] ="";
		$data['title'] = $this->session->userdata('title');

		if($data1 != '')
			$data['frontpage'] = $this->Holdings_model->get_frontpage_serials($var1);
		else
			$data['frontpage']=="";

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('holdings/frontpage', $data, $page);
	}

	//loading database to fields in view
	public function holdings_edit()
	{
		$output =  array();
		$output1 =  array();
		$data = $this->Holdings_model->holdings_edit($_POST["id"]);  
		$data1 = $this->Holdings_model->indices_edit($_POST["id"]);
		$holdings_id = $this->input->post('HoldingsID');

		foreach($data as $row)  
		{ 
			$output['HoldingsID']                              = $row->HoldingsID;   

			$output['ClassificationNumber']                    = $row->ClassificationNumber;
			$output['ItemNumber']                              = $row->ItemNumber;
			$output['CopyrightDate']                           = $row->CopyrightDate;

			$output['EditionStatement']                        = $row->EditionStatement;
			$output['RemainderofEditionStatement']             = $row->RemainderofEditionStatement;

			$output['Title']                                   = $row->Title;
			$output['RemainderoftheTitle']                     = $row->RemainderoftheTitle;
			$output['StatementofResponsibility']               = $row->StatementofResponsibility;

			$output['AbbreviatedTitle']               		   = $row->AbbreviatedTitle;

			$output['PhysicalExtension']                       = $row->PhysicalExtension;
			$output['PhysicalDescription']                     = $row->PhysicalDescription;
			$output['PhysicalDimension']                       = $row->PhysicalDimension;
			$output['PhysicalAccompanyingMaterial']            = $row->PhysicalAccompanyingMaterial;
			$output['PlayingTime']            				   = $row->PlayingTime;

			$output['DissertationNote']                        = $row->DissertationNote;
			$output['DegreeType']                     		   = $row->DegreeType;
			$output['NameofGrantingInstitution']               = $row->NameofGrantingInstitution;
			$output['YearDegreeGranted']                       = $row->YearDegreeGranted;

			$output['NameofSource']               			   = $row->NameofSource;
			$output['UniformResourceIdentifier']               = $row->UniformResourceIdentifier;

			$output['SpecialCodedDates']               		   = $row->SpecialCodedDates;
			$output['AddressofTheImplementingAgency']          = $row->AddressofTheImplementingAgency;
			$output['NameofImplementingAgency']                = $row->NameofImplementingAgency;
			$output['YearofCompletionofTheProject']            = $row->YearofCompletionofTheProject;

			$output['TermsGoverningAccess']               	   = $row->TermsGoverningAccess;
			$output['JurisdictionName']               		   = $row->JurisdictionName;
			$output['PhysicalAccessProvisions']                = $row->PhysicalAccessProvisions;
			$output['TypeofReport']                			   = $row->TypeofReport;
			$output['PeriodCovered']                           = $row->PeriodCovered;

			$output['TypeofRecording']                         = $row->TypeofRecording;
			$output['RecordingMedium']                     	   = $row->RecordingMedium;
			$output['PlayingSpeed']               			   = $row->PlayingSpeed;

			$output['CatalogNumber']                           = $row->CatalogNumber;
			$output['CatalogDate']                             = $row->CatalogDate;
			$output['CatalogSource']                           = $row->CatalogSource;

			$output['cboBroadClassification']                   = $row->cboBroadClassification;
			$output['cboMaterialType']                          = $row->cboMaterialType;

			$output['ISBN']                                    = $row->ISBN;
			$output['ISSN']                                    = $row->ISSN;
			$output['cboLanguageID']                           = $row->cboLanguageID;        

			$output['cboContentTypeTerm']                      = $row->cboContentTypeTerm;
			$output['cboContentTypeCode']                      = $row->cboContentTypeCode;
			$output['ContentTypeSource']                       = $row->ContentTypeSource;
			$output['cboMediaTypeID']                          = $row->cboMediaTypeID;
			$output['cboMediaTypeCode']                        = $row->cboMediaTypeCode;
			$output['MediaSource']                             = $row->MediaSource;
			$output['cboCarrierTypeID']                        = $row->cboCarrierTypeID;
			$output['cboCarrierTypeCode']                      = $row->cboCarrierTypeCode;
			$output['CarrierSource']                           = $row->CarrierSource;
			$output['DatesofPublication']                      = $row->DatesofPublication;
			$output['TimePeriodofCreation']                    = $row->TimePeriodofCreation;
			$output['SeriesStatementID']                       = $row->SeriesStatementID;
			$output['SeriesStatement']                         = $row->SeriesStatement;
			$output['VolumeSequentialDesignation']             = $row->VolumeSequentialDesignation;
			$output['GeneralNote']                             = $row->GeneralNote;
			$output['BibliographicNote']                       = $row->BibliographicNote;
			$output['FormattedContents']                       = $row->FormattedContents;
			$output['ScopeandContent']                         = $row->ScopeandContent;
			$output['Summary']                                 = $row->Summary;
			$output['AdditionalPhysicalFormAvailableNote']     = $row->AdditionalPhysicalFormAvailableNote;
			$output['AvailabilitySource']                      = $row->AvailabilitySource;
			$output['AvailabilityConditions']                  = $row->AvailabilityConditions;
			$output['PublicationStatus']                       = $row->PublicationStatus;
			$output['Publication']                             = $row->PublicationStatus;
		}

		foreach($data1 as $row) 
		{ 
			$output1['indexID']                                   = $row->indexID;
			$output1['Author']                                    = $row->Author;
			$output1['Publisher']                                 = $row->Publisher;
			$output1['PublicationYear']                           = $row->PublicationYear;
			$output1['Subjects']                                  = $row->SubjectHeading;
		}

		echo json_encode(array_merge($output,$output1));
	}

	//loading contents from database to fields in view for publication
	public function publications_edit()
	{
		$output =  array();
		$data = $this->Holdings_model->publications_edit($_POST["id"]);
		$publications_id['publications_id'] = $this->input->post('PublicationID');

		foreach($data as $row)  
		{ 
			$output['HoldingsID']                              = $row->HoldingsID;
			$output['PublicationID']                           = $row->PublicationID;

			$output['cboListForImprint']                       = $row->cboListForImprint;
			$output['cboListForTypeImprint']                   = $row->cboListForTypeImprint;

			$output['PublicationPlace']                        = $row->PublicationPlace;
			$output['Publisher']                               = $row->Publisher;
			$output['PublicationDate']                         = $row->PublicationDate;  
		}

		echo json_encode($output);
	}

	//loading contents from database to fields in view for holdings copy
	public function holdingscopy_edit()
	{ 
		$output =  array();
		$data = $this->Holdings_model->holdingscopy_edit($_POST["id"]);
		$holdingscopy_id['holdingscopy_id'] = $this->input->post('HoldingsCopyID');

		foreach($data as $row)
		{ 
			$output['HoldingsCopyID']                          = $row->HoldingsCopyID;
			$output['AcquisitionID']                           = $row->AcquisitionID;
			$output['HoldingsID']                              = $row->HoldingsID;
			$output['cboLocationID']                           = $row->cboLocationID;
			$output['AccessionNumber']                         = $row->AccessionNumber;
			$output['CirculationNumber']                       = $row->CirculationNumber;
			$output['Cost']                                    = $row->Cost;
			$output['DateAcquired']                            = $row->DateAcquired;
			$output['cboAcquisitionMode']                      = $row->cboAcquisitionMode;
			$output['Source']                     			   = $row->Source;
			$output['UseRestrictions']                         = $row->UseRestrictions;  
			$output['ItemStatus']                              = $row->ItemStatus;
			$output['TemporaryLocation']                       = $row->TemporaryLocation; 
			$output['CopyNumber']                              = $row->CopyNumber;
			$output['NonPublicNote']                           = $row->NonPublicNote;
			$output['CopyrightDate']                           = $row->CopyrightDate;

			$output['cboHoldingsCopyFrequency']					=$row->cboHoldingsCopyFrequency;
			$output['cboHoldingsCopyDay']						=$row->cboHoldingsCopyDay;
			$output['cboHoldingsCopyWeek']						=$row->cboHoldingsCopyWeek;
			$output['cboHoldingsCopyMonth']						=$row->cboHoldingsCopyMonth;
			$output['cboHoldingsCopyQuarter']				    =$row->cboHoldingsCopyQuarter;
			$output['cboHoldingsCopySemiAnnual']				=$row->cboHoldingsCopySemiAnnual;
			$output['frequencyYear']				    		=$row->frequencyYear;

			$output['InventoryID']				    			=$row->InventoryID;
			$output['InventoryStatus']				    		=$row->InventoryStatus;
			$output['InventoryDate']				    		=$row->InventoryDate;
			$output['UserID']				    				=$row->UserID;
			$output['ConsortiumAdd']				    			=$row->ConsortiumAdd;
		}

		echo json_encode($output);
	}

	//loading contents from database to fields in view for authors
	public function authors_edit()
	{
		$output =  array();
		$output1 =  array();
		$data = $this->Holdings_model->authors_edit($_POST["id"],$_POST["iAuthor"]);
		$data1 = $this->Holdings_model->indices_edit($_POST["hid"]);
		$data2 = $this->Holdings_model->holdings_edit($_POST["hid"]);
		$authors_id = $this->input->post('AuthorID');

		if ($_POST["iAuthor"] == '110')
		{
			foreach($data as $row) 
			{ 
				$output['AuthorID']                                = $row->AuthorID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboAuthor']                               = $row->cboAuthor;

				$output['cboAuthorEntry110']                       = $row->cboAuthorEntry110;
				$output['CorporateNameorJurisdictionName110']      = $row->CorporateNameorJurisdictionName110;
				$output['SubordinateUnit110']                      = $row->SubordinateUnit110;
				$output['LocationofMeeting110']                    = $row->LocationofMeeting110;
				$output['DateofMeetingorTreatySigning110']         = $row->DateofMeetingorTreatySigning110;
				$output['NumberofPartSectionMeeting110']           = $row->NumberofPartSectionMeeting110;
			}
		}
		else if ($_POST["iAuthor"] == '100')
		{
			foreach($data as $row) 
			{ 
				$output['AuthorID']                                = $row->AuthorID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboAuthor']                               = $row->cboAuthor;

				$output['cboAuthorEntry100']                       = $row->cboAuthorEntry100;
				$output['PersonalName100']                         = $row->PersonalName100;
				$output['Numeration100']                           = $row->Numeration100;
				$output['TitlesAndWords100']                       = $row->TitlesAndWords100;
				$output['RelatorTerm100']                          = $row->RelatorTerm100;
				$output['DateAssociatedWith100']                   = $row->DateAssociatedWith100;
				$output['FullerFormofName100']                     = $row->FullerFormofName100;
				$output['Affiliation100']                          = $row->Affiliation100;
			}
		}
		else if ($_POST["iAuthor"] == '700')
		{
			foreach($data as $row)  
			{ 
				$output['AuthorID']                                = $row->AuthorID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboAuthor']                               = $row->cboAuthor;

				$output['cboAuthorEntry700']                       = $row->cboAuthorEntry700;
				$output['PersonalName700']                         = $row->PersonalName700; 
				$output['Numeration700']                           = $row->Numeration700;
				$output['TitlesAndWords700']                       = $row->TitlesAndWords700;
				$output['RelatorTerm700']                          = $row->RelatorTerm700;
				$output['DateAssociatedWith700']                   = $row->DateAssociatedWith700; 
				$output['FullerFormofName700']                     = $row->FullerFormofName700;
				$output['Affiliation700']                          = $row->Affiliation700;
			}
		}
		else if ($_POST["iAuthor"] == '710')
		{
			foreach($data as $row) 
			{ 
				$output['AuthorID']                                = $row->AuthorID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboAuthor']                               = $row->cboAuthor;

				$output['cboAuthorEntry710']                       = $row->cboAuthorEntry710;
				$output['CorporateNameorJurisdictionName710']      = $row->CorporateNameorJurisdictionName710;
				$output['SubordinateUnit710']                      = $row->SubordinateUnit710;
				$output['LocationofMeeting710']                    = $row->LocationofMeeting710;
				$output['DateofMeetingorTreatySigning710']         = $row->DateofMeetingorTreatySigning710;
			}
		}

		echo json_encode(array_merge($output,$output1));
	}

	//loading contents from database to fields in view for subjects
	public function subjects_edit()
	{
		$output =  array();
		$data = $this->Holdings_model->subjects_edit($_POST["id"],$_POST["iSubjects"]);
		$subjects_id = $this->input->post('SubjectsID');

		if ($_POST["iSubjects"] == '650')
		{
			foreach($data as $row) 
			{ 
				$output['SubjectID']                               = $row->SubjectID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboSubject']                              = $row->cboSubject;

				$output['TopicalTermSubjectHeading650']            = $row->TopicalTermSubjectHeading650;
				$output['SubjectSubdivision650']                   = $row->SubjectSubdivision650;
				$output['FormSubdivision650']                      = $row->FormSubdivision650;
				$output['SubjectChronology650']                    = $row->SubjectChronology650;
				$output['HeadingGeography650']                     = $row->HeadingGeography650;       
			}
		}
		else if ($_POST["iSubjects"] == '600')
		{
			foreach($data as $row) 
			{ 
				$output['SubjectID']                                = $row->SubjectID;
				$output['HoldingsID']                               = $row->HoldingsID;
				$output['cboSubject']                               = $row->cboSubject;

				$output['PersonalNameSubjectHeading600']            = $row->PersonalNameSubjectHeading600;
				$output['TitlesandOtherWordsAssociatedwithaName600'] = $row->TitlesandOtherWordsAssociatedwithaName600;
				$output['SubjectSubdivision600']                    = $row->SubjectSubdivision600;
				$output['FormSubdivision600']                       = $row->FormSubdivision600;
				$output['ChronologicalSubdivision600']              = $row->ChronologicalSubdivision600;
				$output['GeographicSubdivision600']                 = $row->GeographicSubdivision600;
			}
		}
		else if ($_POST["iSubjects"] == '610')
		{
			foreach($data as $row)
			{ 
				$output['SubjectID']                               = $row->SubjectID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboSubject']                              = $row->cboSubject;

				$output['CorporateNameSubjectHeading610']          = $row->CorporateNameSubjectHeading610;
				$output['CorporateNameSubordinateUnit610']         = $row->CorporateNameSubordinateUnit610; 
				$output['GeneralSubdivision610']                   = $row->GeneralSubdivision610;
				$output['FormSubdivision610']                      = $row->FormSubdivision610;
				$output['ChronologicalSubdivision610']             = $row->ChronologicalSubdivision610;
				$output['GeographicSubdivision610']                = $row->GeographicSubdivision610; 

			}
		}
		else if ($_POST["iSubjects"] == '611')
		{
			foreach($data as $row) 
			{ 
				$output['SubjectID']                               = $row->SubjectID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboSubject']                              = $row->cboSubject;

				$output['MeetingConferenceNameSubjectHeading611']  = $row->MeetingConferenceNameSubjectHeading611;
				$output['Date611']                                 = $row->Date611;
				$output['Location611']                             = $row->Location611;
			}
		}
		else if ($_POST["iSubjects"] == '630')
		{
			foreach($data as $row) 
			{ 
				$output['SubjectID']                               = $row->SubjectID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboSubject']                              = $row->cboSubject;

				$output['UniformTitleSubjectHeading630']           = $row->UniformTitleSubjectHeading630;
				$output['SubjectSubdivision630']                   = $row->SubjectSubdivision630;
				$output['FormSubdivision630']                      = $row->FormSubdivision630;
			}
		}

		else if ($_POST["iSubjects"] == '651')
		{
			foreach($data as $row)
			{ 
				$output['SubjectID']                               = $row->SubjectID;
				$output['HoldingsID']                              = $row->HoldingsID;
				$output['cboSubject']                              = $row->cboSubject;

				$output['GeographicNameSubjectHeading651']         = $row->GeographicNameSubjectHeading651;
				$output['GeographicNameSubjectSubdivision651']     = $row->GeographicNameSubjectSubdivision651;
				$output['FormSubdivision651']                      = $row->FormSubdivision651;
			}
		}

		echo json_encode($output);
	}

	//loading contents from database to fields in view for multimedia
	public function multimedia_edit()
	{
		$output =  array();
		$data = $this->Holdings_model->multimedia_edit($_POST["id"]);

		foreach($data as $row)
		{
			$output['UploadName']					= $row->FileName;
			$output['Restrict']						= $row->Permission;
		}

		$this->Holdings_model->update_multimedia($_POST["id"], $_POST["restriction"]);

		echo json_encode($output);
	}

	// Create authors record
	public function authors_create()
	{
		$this->validate_data_author();

		if($this->input->post('AuthorID') != '')
			$author_id['$author_id']  = $this->input->post('AuthorID');

		$HoldingsID = $this->input->post('HoldingsID');

		$this->input->post('cboAuthor')             == '' ? $cboAuthor = ''             : $cboAuthor = $this->input->post('cboAuthor');

		//Personal Author
		$this->input->post('cboAuthorEntry100')     == '' ? $cboAuthorEntry100 = ''     : $cboAuthorEntry100  = $this->input->post('cboAuthorEntry100');

		$this->input->post('PersonalName100')       == '' ? $PersonalName100 = ''       : $PersonalName100        = '$a' . $this->input->post('PersonalName100');
		$this->input->post('Numeration100')         == '' ? $Numeration100 = ''         : $Numeration100          = '$b' . $this->input->post('Numeration100');
		$this->input->post('TitlesAndWords100')     == '' ? $TitlesAndWords100 = ''     : $TitlesAndWords100      = '$c' . $this->input->post('TitlesAndWords100');
		$this->input->post('RelatorTerm100')        == '' ? $RelatorTerm100 = ''        : $RelatorTerm100         = '$e' . $this->input->post('RelatorTerm100');
		$this->input->post('DateAssociatedWith100') == '' ? $DateAssociatedWith100 = '' : $DateAssociatedWith100  = '$d' . $this->input->post('DateAssociatedWith100');
		$this->input->post('FullerFormofName100')   == '' ? $FullerFormofName100 = ''   : $FullerFormofName100    = '$q' . $this->input->post('FullerFormofName100');
		$this->input->post('Affiliation100')        == '' ? $Affiliation100 = ''        : $Affiliation100         = '$u' . $this->input->post('Affiliation100');

		//Added Personal Author
		$this->input->post('cboAuthorEntry700')     == '' ? $cboAuthorEntry700 = ''     : $cboAuthorEntry700      = $this->input->post('cboAuthorEntry110');
		$this->input->post('PersonalName700')       == '' ? $PersonalName700 = ''       : $PersonalName700        = '$a' . $this->input->post('PersonalName700');
		$this->input->post('Numeration700')         == '' ? $Numeration700 = ''         : $Numeration700          = '$b' . $this->input->post('Numeration700');
		$this->input->post('TitlesAndWords700')     == '' ? $TitlesAndWords700 = ''     : $TitlesAndWords700      = '$c' . $this->input->post('TitlesAndWords700');
		$this->input->post('RelatorTerm700')        == '' ? $RelatorTerm700 = ''        : $RelatorTerm700         = '$e' . $this->input->post('RelatorTerm700');
		$this->input->post('DateAssociatedWith700') == '' ? $DateAssociatedWith700 = '' : $DateAssociatedWith700  = '$d' . $this->input->post('DateAssociatedWith700');
		$this->input->post('FullerFormofName700')   == '' ? $FullerFormofName700 = ''   : $FullerFormofName700    = '$q' . $this->input->post('FullerFormofName700');
		$this->input->post('Affiliation700')        == '' ? $Affiliation700 = ''        : $Affiliation700         = '$u' . $this->input->post('Affiliation700');

		//Corporate Author
		$this->input->post('cboAuthorEntry110')                  == '' ? $cboAuthorEntry110 = ''     : $cboAuthorEntry110      = $this->input->post('cboAuthorEntry110');
		$this->input->post('CorporateNameorJurisdictionName110') == '' ? $CorporateNameorJurisdictionName110 = '' : $CorporateNameorJurisdictionName110 = '$a' . $this->input->post('CorporateNameorJurisdictionName110');
		$this->input->post('SubordinateUnit110')                 == '' ? $SubordinateUnit110 = '' : $SubordinateUnit110 = '$b' . $this->input->post('SubordinateUnit110');
		$this->input->post('LocationofMeeting110')               == '' ? $LocationofMeeting110 = '' : $LocationofMeeting110 = '$c' . $this->input->post('LocationofMeeting110');
		$this->input->post('DateofMeetingorTreatySigning110')    == '' ? $DateofMeetingorTreatySigning110 = '' : $DateofMeetingorTreatySigning110 = '$d' . $this->input->post('DateofMeetingorTreatySigning110');
		$this->input->post('NumberofPartSectionMeeting110')      == '' ? $NumberofPartSectionMeeting110 = '' : $NumberofPartSectionMeeting110 = '$n' . $this->input->post('NumberofPartSectionMeeting110');

		//Added Corporate Author
		$this->input->post('txtCorporate710') == '' ? $cboCorporate710 = '' : $cboCorporate710 = $this->input->post('cboCorporate710');
		$this->input->post('CorporateNameorJurisdictionName710') == '' ? $CorporateNameorJurisdictionName710 = '' : $CorporateNameorJurisdictionName710 = '$a' . $this->input->post('CorporateNameorJurisdictionName710');
		$this->input->post('SubordinateUnit710') == '' ? $SubordinateUnit710 = '' : $SubordinateUnit710 = '$b' . $this->input->post('SubordinateUnit710');
		$this->input->post('LocationofMeeting710') == '' ? $LocationofMeeting710 = '' : $LocationofMeeting710 = '$c' . $this->input->post('LocationofMeeting710');
		$this->input->post('DateofMeetingorTreatySigning710') == '' ? $DateofMeetingorTreatySigning710 = '' : $DateofMeetingorTreatySigning710 = '$d' . $this->input->post('DateofMeetingorTreatySigning710');

		//CONCATENATION
		$AuthorName = "";

		if($this->input->post('cboAuthor') == '100')
			$AuthorName = '100' . $cboAuthorEntry100 . '#' . $PersonalName100 . $Numeration100 . $TitlesAndWords100 . $RelatorTerm100 . $DateAssociatedWith100 . $FullerFormofName100 . $Affiliation100;  
		else if ($this->input->post('cboAuthor') == '700')
			$AuthorName = '700' . $cboAuthorEntry700 . '#' . $PersonalName700 . $Numeration700 . $TitlesAndWords700 . $RelatorTerm700 . $DateAssociatedWith700 . $FullerFormofName700 . $Affiliation700;
		else if ($this->input->post('cboAuthor') == '110')
			$AuthorName = '110' . $cboAuthorEntry110 . '#' . $CorporateNameorJurisdictionName110 . $SubordinateUnit110 . $LocationofMeeting110 . $DateofMeetingorTreatySigning110 . $NumberofPartSectionMeeting110;
		else if ($this->input->post('cboAuthor') == '710')
			$AuthorName = '710' . $cboCorporate710 . '#' . $CorporateNameorJurisdictionName710 . $SubordinateUnit710 . $LocationofMeeting710 . $DateofMeetingorTreatySigning710;

		// Store publications fields entry into an array
		$authors_record = array
		( 
			'HoldingsID'      => $HoldingsID,  
			'AuthorTag'       => $cboAuthor,
			'AuthorName'      => $AuthorName
		);

		if($this->input->post('AuthorID') == "")
			$this->Holdings_model->create_authors($authors_record);
		else if($this->input->post('AuthorID') != "")
			$this->Holdings_model->update_authors($this->input->post('AuthorID'), $authors_record);

		//For updating table indices
		$output2 =  array();
		$data1 = $this->Holdings_model->indices_edit($this->input->post('HoldingsID'));
		$data2 = $this->Holdings_model->holdings_edit($this->input->post('HoldingsID'));

		foreach($data1 as $row)
		{ 
			$Author	= $row->Author;
		}

		foreach($data2 as $row)
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1")
			$this->Holdings_model->update_indices_author($HoldingsID, $Author);

		echo json_encode(array("status" => TRUE));
	}

	// Create publications record
	public function publications_create()
	{
		$this->validate_data_publication();

		if($this->input->post('PublicationID') != '')
			$publications_id['publications_id'] = $this->input->post('PublicationID');

		$HoldingsID = $this->input->post('HoldingsID');
		$ListForImprint = $this->input->post('cboListForImprint');
		$ListForTypeImprint = $this->input->post('cboListForTypeImprint');
		$this->input->post('PublicationPlace') == '' ? $PublicationPlace = '' : $PublicationPlace = '$a' . $this->input->post('PublicationPlace');
		$this->input->post('Publisher') == '' ? $Publisher = '' : $Publisher = '$b' . $this->input->post('Publisher');
		$this->input->post('PublicationDate') == '' ? $PublicationDate = '' : $PublicationDate = '$c' . $this->input->post('PublicationDate');
		$PublicationYear = $this->input->post('PublicationDate');

		//CONCATENATION
		$Publication = "";

		if($PublicationPlace != "" || $Publisher != "" || $PublicationDate != "")
			$Publication = '264' . $ListForImprint . $ListForTypeImprint . $PublicationPlace . $Publisher . $PublicationDate;

		// Store publications fields entry into an array
		$publications_record = array
		( 
			'HoldingsID'      => $HoldingsID,  
			'Publication'     => $Publication,
			'PublicationYear' => $PublicationYear
		);

		if($this->input->post('PublicationID') == "")
			$this->Holdings_model->create_publications($publications_record);
		else
			$this->Holdings_model->update_publications($this->input->post('PublicationID'), $publications_record);

		//For updating table indices
		$output2 =  array();
		$data1 = $this->Holdings_model->indices_edit($HoldingsID);
		$data2 = $this->Holdings_model->holdings_edit($HoldingsID);

		foreach($data1 as $row)
		{ 
			$Publisher = $row->Publisher;
		}

		foreach($data2 as $row)
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1")
			$this->Holdings_model->update_indices_publications($HoldingsID, $Publisher);

		echo json_encode(array("status" => TRUE));
	}

	// Create holdings copy record
	public function holdingscopy_create()
	{

		$this->validate_data_holdingscopy();

		$data['types'] = $this->Holdings_model->get_type();

		$holdingscopy_id = $this->input->post('HoldingsCopyID');

		$this->input->post('InventoryDate') != "" ? $InventoryDate = date('Y/m/d H:i:s', strtotime($this->input->post('InventoryDate'))) : $InventoryDate = NULL;

		// Store publications fields entry into an array
		$holdingscopy_record = array
		( 
			'HoldingsID'         => $this->input->post('HoldingsID'),
			'LocationID'    	 => $this->input->post('cboLocationID'),
			'AccessionNumber'    => $this->input->post('AccessionNumber'),
			'CirculationNumber'  => $this->input->post('CirculationNumber'),
			'Cost'               => $this->input->post('Cost'),
			'DateAcquired'       => $this->input->post('DateAcquired'),
			'AcquisitionMode'    => $this->input->post('cboAcquisitionMode'),
			'Source'             => $this->input->post('Donor'),
			'UseRestrictions'    => $this->input->post('UseRestrictions'),
			'ItemStatus'         => $this->input->post('ItemStatus'),
			'TemporaryLocation'  => $this->input->post('TemporaryLocation'),
			'CopyNumber'         => $this->input->post('CopyNumber'),
			'NonPublicNote'      => $this->input->post('NonPublicNote'),
			'CopyrightDate'      => $this->input->post('CopyrightDate'),
			'Frequency' 		 =>$this->input->post('cboHoldingsCopyFrequency'),
			'InventoryStatus' 	 =>$this->input->post('InventoryStatus'),
			'UpdatedAt' => date('Y-m-d H:i:s')
		);


		$acquisitions_record = array
		(
			'Day' => $this->input->post('cboHoldingsCopyDay'),
			'Week' => $this->input->post('cboHoldingsCopyWeek'),
			'Month' => $this->input->post('cboHoldingsCopyMonth'),
			'Quarter' => $this->input->post('cboHoldingsCopyQuarter'),
			'Semiannual' => $this->input->post('cboHoldingsCopySemiAnnual'),
			'Year' => $this->input->post('frequencyYear')

		);

		$inventory_record = array
		(	
			'HoldingsID'         => $this->input->post('HoldingsID'),
			'CirculationNumber'  => $this->input->post('CirculationNumber'),
			'InventoryDate'	 	 => $InventoryDate,
			'UserID'			 =>$this->Accounts_model->get_session_data('UserID')
		);

		$this->Holdings_model->update_holdingscopy($this->input->post('HoldingsCopyID'), $holdingscopy_record);
		$this->Holdings_model->update_acquisitions($this->input->post('AcquisitionID'), $acquisitions_record);

		if ($this->input->post('InventoryID')== "")
		{
			if ($this->input->post('InventoryStatus')== '1')
				$this->Holdings_model->create_inventory($inventory_record);
		}
		else
		{
			if ($this->input->post('InventoryStatus')== '1')
				$this->Holdings_model->update_inventory($this->input->post('CirculationNumber'), $inventory_record);
			else if($this->input->post('InventoryStatus')== '0')
				$this->Holdings_model->delete_inventory($this->input->post('CirculationNumber'));
		}

		echo json_encode(array("status" => TRUE));
	}

	// Create subjects record
	public function subjects_create()
	{
		if($this->input->post('SubjectID') != '')
			$subject_id = $this->input->post('SubjectID');

		$HoldingsID = $this->input->post('HoldingsID');

		$this->input->post('cboSubject') == '' ? $cboSubject = '' : $cboSubject = $this->input->post('cboSubject');

		//Topical Term
		$this->input->post('TopicalTermSubjectHeading650')               == '' ? $TopicalTermSubjectHeading650              = ''       : $TopicalTermSubjectHeading650        = '$a' . $this->input->post('TopicalTermSubjectHeading650');
		$this->input->post('SubjectSubdivision650')                      == '' ? $SubjectSubdivision650                     = ''       : $SubjectSubdivision650               = '$x' . $this->input->post('SubjectSubdivision650');
		$this->input->post('FormSubdivision650')                         == '' ? $FormSubdivision650                        = ''       : $FormSubdivision650                  = '$v' . $this->input->post('FormSubdivision650');
		$this->input->post('SubjectChronology650')                       == '' ? $SubjectChronology650                      = ''       : $SubjectChronology650                = '$y' . $this->input->post('SubjectChronology650');
		$this->input->post('HeadingGeography650')                        == '' ? $HeadingGeography650                       = ''       : $HeadingGeography650                 = '$z' . $this->input->post('HeadingGeography650');

		//Personal Name
		$this->input->post('PersonalNameSubjectHeading600')              == '' ? $PersonalNameSubjectHeading600             = ''       : $PersonalNameSubjectHeading600       = '$a' . $this->input->post('PersonalNameSubjectHeading600');
		$this->input->post('TitlesandOtherWordsAssociatedwithaName600')  == '' ? $TitlesandOtherWordsAssociatedwithaName600 = ''       : $TitlesandOtherWordsAssociatedwithaName600        = '$c' . $this->input->post('TitlesandOtherWordsAssociatedwithaName600');
		$this->input->post('SubjectSubdivision600')                      == '' ? $SubjectSubdivision600                     = ''       : $SubjectSubdivision600               = '$x' . $this->input->post('SubjectSubdivision600');
		$this->input->post('FormSubdivision600')                         == '' ? $FormSubdivision600                        = ''       : $FormSubdivision600                  = '$v' . $this->input->post('FormSubdivision600');
		$this->input->post('ChronologicalSubdivision600')                == '' ? $ChronologicalSubdivision600               = ''       : $ChronologicalSubdivision600         = '$y' . $this->input->post('ChronologicalSubdivision600');
		$this->input->post('GeographicSubdivision600')                   == '' ? $GeographicSubdivision600                  = ''       : $GeographicSubdivision600            = '$z' . $this->input->post('GeographicSubdivision600');

		//Corporate Name
		$this->input->post('CorporateNameSubjectHeading610')             == '' ? $CorporateNameSubjectHeading610            = ''       : $CorporateNameSubjectHeading610       = '$a' . $this->input->post('CorporateNameSubjectHeading610');
		$this->input->post('CorporateNameSubordinateUnit610')            == '' ? $CorporateNameSubordinateUnit610           = ''       : $CorporateNameSubordinateUnit610      = '$b' . $this->input->post('CorporateNameSubordinateUnit610');
		$this->input->post('GeneralSubdivision610')                      == '' ? $GeneralSubdivision610                     = ''       : $GeneralSubdivision610                = '$x' . $this->input->post('GeneralSubdivision610');
		$this->input->post('FormSubdivision610')                         == '' ? $FormSubdivision610                        = ''       : $FormSubdivision610                   = '$v' . $this->input->post('FormSubdivision610');
		$this->input->post('ChronologicalSubdivision610')                == '' ? $ChronologicalSubdivision610               = ''       : $ChronologicalSubdivision610          = '$y' . $this->input->post('ChronologicalSubdivision610');
		$this->input->post('GeographicSubdivision610')                   == '' ? $GeographicSubdivision610                  = ''       : $GeographicSubdivision610             = '$z' . $this->input->post('GeographicSubdivision610');


		//Meeting / Conference
		$this->input->post('MeetingConferenceNameSubjectHeading611')     == '' ? $MeetingConferenceNameSubjectHeading611    = ''       : $MeetingConferenceNameSubjectHeading611 = '$a' . $this->input->post('MeetingConferenceNameSubjectHeading611');
		$this->input->post('Date611')                                    == '' ? $Date611                                   = ''       : $Date611                               = '$d' . $this->input->post('Date611');
		$this->input->post('Location611')                                == '' ? $Location611                               = ''       : $Location611                           = '$c' . $this->input->post('Location611');

		//Uniform Title
		$this->input->post('UniformTitleSubjectHeading630')              == '' ? $UniformTitleSubjectHeading630             = ''       : $UniformTitleSubjectHeading630         = '$a' . $this->input->post('UniformTitleSubjectHeading630');
		$this->input->post('SubjectSubdivision630')                      == '' ? $SubjectSubdivision630                     = ''       : $SubjectSubdivision630                 = '$x' . $this->input->post('SubjectSubdivision630');
		$this->input->post('FormSubdivision630')                         == '' ? $FormSubdivision630                        = ''       : $FormSubdivision630                    = '$v' . $this->input->post('FormSubdivision630');

		//Geographic
		$this->input->post('GeographicNameSubjectHeading651')            == '' ? $GeographicNameSubjectHeading651           = ''       : $GeographicNameSubjectHeading651       = '$a' . $this->input->post('GeographicNameSubjectHeading651');
		$this->input->post('GeographicNameSubjectSubdivision651')        == '' ? $GeographicNameSubjectSubdivision651       = ''       : $GeographicNameSubjectSubdivision651   = '$x' . $this->input->post('GeographicNameSubjectSubdivision651');
		$this->input->post('FormSubdivision651')                         == '' ? $FormSubdivision651                        = ''       : $FormSubdivision651                    = '$v' . $this->input->post('FormSubdivision651');


		//CONCATENATION
		$Subject = "";

		if($this->input->post('cboSubject') == '650')
			$Subject = '650' . '#' . $TopicalTermSubjectHeading650 . $SubjectSubdivision650 . $FormSubdivision650 . $SubjectChronology650 . $HeadingGeography650 ;
		else if($this->input->post('cboSubject') == '600')
			$Subject = '600' . '#' . $PersonalNameSubjectHeading600 . $TitlesandOtherWordsAssociatedwithaName600 . $SubjectSubdivision600 . $FormSubdivision600 . $ChronologicalSubdivision600 . $GeographicSubdivision600 ;
		else if($this->input->post('cboSubject') == '610')
			$Subject = '610' . '#' . $CorporateNameSubjectHeading610 . $CorporateNameSubordinateUnit610 . $GeneralSubdivision610 . $FormSubdivision610 . $ChronologicalSubdivision610 . $GeographicSubdivision610 ;  
		else if($this->input->post('cboSubject') == '611')
			$Subject = '611' . '#' . $MeetingConferenceNameSubjectHeading611 . $Date611 . $Location611 ;  
		else if($this->input->post('cboSubject') == '630')
			$Subject = '630' . '#' . $UniformTitleSubjectHeading630 . $SubjectSubdivision630 . $FormSubdivision630 ; 
		else if($this->input->post('cboSubject') == '651')
			$Subject = '651' . '#' . $GeographicNameSubjectHeading651 . $GeographicNameSubjectSubdivision651 . $FormSubdivision651 ; 

		// Store publications fields entry into an array
		$subjects_record = array
		( 
			'HoldingsID'         => $HoldingsID,
			'SubjectType'        => $cboSubject,
			'Subject'            => $Subject
		);

		if($this->input->post('SubjectID') == "")
			$this->Holdings_model->create_subjects($subjects_record);
		else if($this->input->post('SubjectID') != "")
			$this->Holdings_model->update_subjects($this->input->post('SubjectID'),$subjects_record);

		//For updating table indices
		$output2 =  array();
		$output3 = array();

		$data1 = $this->Holdings_model->indices_edit($HoldingsID);
		$data2 = $this->Holdings_model->holdings_edit($HoldingsID);

		foreach($data1 as $row)
		{ 
			$Subjects = $row->SubjectHeading;
		}


		foreach($data2 as $row)
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1")
		{
			//convert string to array
			$output3 = explode(',', $Subjects);

			//remove duplicate subjects to be displayed in tblindices
			$result = array_unique($output3);

			//convert array to text
			$uniquesubjects= implode(",", $result);

			$this->Holdings_model->update_indices_subjects($HoldingsID, $uniquesubjects);
		}	

		echo json_encode(array("status" => TRUE));
	}

	// Create holdings record
	public function create()
	{
		$this->validate_data();

		$ids = array();
		$catalog_number='';

		$holdings_id = $this->input->post('HoldingsID');

		$this->input->post('ClassificationNumber') == '' ? $ClassificationNumber = '' : $ClassificationNumber = '$a' . $this->input->post('ClassificationNumber');
		$this->input->post('ItemNumber') == '' ? $ItemNumber = '' : $ItemNumber = '$b' . $this->input->post('ItemNumber');
		$this->input->post('CopyrightDate') == '' ? $CopyrightDate = '' : $CopyrightDate = '$c' . $this->input->post('CopyrightDate');

		$this->input->post('EditionStatement') == '' ? $EditionStatement = '' : $EditionStatement = '$a' . $this->input->post('EditionStatement');
		$this->input->post('RemainderofEditionStatement') == '' ? $RemainderofEditionStatement = '' : $RemainderofEditionStatement = '$b' . $this->input->post('RemainderofEditionStatement');

		$this->input->post('Title') == '' ? $Title = '' : $Title = '$a' . $this->input->post('Title');
		$this->input->post('RemainderoftheTitle') == '' ? $RemainderoftheTitle = '' : $RemainderoftheTitle = '$b' . $this->input->post('RemainderoftheTitle');
		$this->input->post('StatementofResponsibility') == '' ? $StatementofResponsibility = '' : $StatementofResponsibility = '$c' . $this->input->post('StatementofResponsibility');

		$this->input->post('Title') == '' ? $Title2 = '' : $Title2 = $this->input->post('Title');
		$this->input->post('RemainderoftheTitle') == '' ? $RemainderoftheTitle2 = '' : $RemainderoftheTitle2 = '/' . $this->input->post('RemainderoftheTitle');

		$this->input->post('PhysicalExtension') == '' ? $PhysicalExtension = '' : $PhysicalExtension = '$a' . $this->input->post('PhysicalExtension');
		$this->input->post('PhysicalDescription') == '' ? $PhysicalDescription = '' : $PhysicalDescription = '$b' . $this->input->post('PhysicalDescription');
		$this->input->post('PhysicalDimension') == '' ? $PhysicalDimension = '' : $PhysicalDimension = '$c' . $this->input->post('PhysicalDimension');
		$this->input->post('PhysicalAccompanyingMaterial') == '' ? $PhysicalAccompanyingMaterial = '' : $PhysicalAccompanyingMaterial = '$e' . $this->input->post('PhysicalAccompanyingMaterial');
		$this->input->post('PlayingTime') == '' ? $PlayingTime = '' : $PlayingTime = '$1' . $this->input->post('PlayingTime');

		$this->input->post('DissertationNote') == '' ? $DissertationNote = '' : $DissertationNote = '$a' . $this->input->post('DissertationNote');
		$this->input->post('DegreeType') == '' ? $DegreeType = '' : $DegreeType = '$b' . $this->input->post('DegreeType');
		$this->input->post('NameofGrantingInstitution') == '' ? $NameofGrantingInstitution = '' : $NameofGrantingInstitution = '$c' . $this->input->post('NameofGrantingInstitution');
		$this->input->post('YearDegreeGranted') == '' ? $YearDegreeGranted = '' : $YearDegreeGranted = '$d' . $this->input->post('YearDegreeGranted');

		$this->input->post('TypeofRecording') == '' ? $TypeofRecording = '' : $TypeofRecording = '$a' .$this->input->post('TypeofRecording');
		$this->input->post('RecordingMedium') == '' ? $RecordingMedium = '' : $RecordingMedium = '$b' . $this->input->post('RecordingMedium');
		$this->input->post('PlayingSpeed') == '' ? $PlayingSpeed = '' : $PlayingSpeed = '$c' . $this->input->post('PlayingSpeed');

		$this->input->post('NameofSource') == '' ? $NameofSource = '' : $NameofSource = '$a' . $this->input->post('NameofSource');
		$this->input->post('UniformResourceIdentifier') == '' ? $UniformResourceIdentifier = '' : $UniformResourceIdentifier = '$u' . $this->input->post('UniformResourceIdentifier');

		$this->input->post('AddressofTheImplementingAgency') == '' ? $AddressofTheImplementingAgency = '' : $AddressofTheImplementingAgency = '$a' . $this->input->post('AddressofTheImplementingAgency');
		$this->input->post('NameofImplementingAgency') == '' ? $NameofImplementingAgency = '' : $NameofImplementingAgency = '$b' . $this->input->post('NameofImplementingAgency');
		$this->input->post('YearofCompletionofTheProject') == '' ? $YearofCompletionofTheProject = '' : $YearofCompletionofTheProject = '$c' . $this->input->post('YearofCompletionofTheProject');

		$this->input->post('TermsGoverningAccess') == '' ? $TermsGoverningAccess = '' : $TermsGoverningAccess = '$a' . $this->input->post('TermsGoverningAccess');
		$this->input->post('JurisdictionName') == '' ? $JurisdictionName = '' : $JurisdictionName = '$b' . $this->input->post('JurisdictionName');
		$this->input->post('PhysicalAccessProvisions') == '' ? $PhysicalAccessProvisions = '' : $PhysicalAccessProvisions = '$c' . $this->input->post('PhysicalAccessProvisions');

		$this->input->post('TypeofReport') == '' ? $TypeofReport = '' : $TypeofReport = '$a' . $this->input->post('TypeofReport');
		$this->input->post('PeriodCovered') == '' ? $PeriodCovered = '' : $PeriodCovered = '$b' . $this->input->post('PeriodCovered');

		$CallNumber = "";
		$Edition = "";
		$TitleStatement = "";
		$PhysicalDescriptionEtc = "";
		$TitleStatement2 = "";
		$Dissertation = "";
		$SoundCharacteristics = "";
		$CitationReferencesNote = "";
		$ProductionDistributionandYearSubmitted = "";
		$RestrictiononAccessNote="";
		$TypesofReportandPeriodCoveredNote="";

		if($ClassificationNumber != "" || $ItemNumber != "" || $CopyrightDate != "")
			$CallNumber = '050##' . $ClassificationNumber . $ItemNumber . $CopyrightDate;

		if($EditionStatement != "" || $RemainderofEditionStatement != "") 
			$Edition = '250##' . $EditionStatement . $RemainderofEditionStatement;

		if($Title != "" || $RemainderoftheTitle != "" || $StatementofResponsibility != "") 
			$TitleStatement = '24500' . $Title . $RemainderoftheTitle . $StatementofResponsibility;

		if($Title2 != "" || $RemainderoftheTitle2 != "" ) 
			$TitleStatement2 =  $Title2 . $RemainderoftheTitle2;

		if($PhysicalExtension != "" || $PhysicalDescription != "" || $PhysicalDimension != "" || $PhysicalAccompanyingMaterial != "" || $PlayingTime != "")
			$PhysicalDescriptionEtc = '300##' . $PhysicalExtension . $PhysicalDescription . $PhysicalDimension . $PhysicalAccompanyingMaterial . $PlayingTime;

		if($DissertationNote != "" || $DegreeType != "" || $NameofGrantingInstitution != "" || $YearDegreeGranted != "")
			$Dissertation = '502##' . $DissertationNote . $DegreeType . $NameofGrantingInstitution . $YearDegreeGranted;

		if($TypeofRecording != "" || $RecordingMedium != "" || $PlayingSpeed != "" )
			$SoundCharacteristics = '344##' . $TypeofRecording . $RecordingMedium . $PlayingSpeed;

		if($NameofSource != "" || $UniformResourceIdentifier != "") 
			$CitationReferencesNote = '510##' . $NameofSource . $UniformResourceIdentifier;

		if($AddressofTheImplementingAgency != "" || $NameofImplementingAgency != "" || $YearofCompletionofTheProject != "") 
			$ProductionDistributionandYearSubmitted = '264##' . $AddressofTheImplementingAgency . $NameofImplementingAgency . $YearofCompletionofTheProject;

		if($TermsGoverningAccess != "" || $JurisdictionName != "" || $PhysicalAccessProvisions != "") 
			$RestrictiononAccessNote = '506##' . $TermsGoverningAccess . $JurisdictionName . $PhysicalAccessProvisions;

		if($TypeofReport != "" || $PeriodCovered != "" ) 
			$TypesofReportandPeriodCoveredNote =  $TypeofReport . $PeriodCovered;

		if($this->input->post('CatalogDate') == "" || $this->input->post('CatalogDate') == "0000-00-00")
			$DateCataloged = date('Y/m/d H:i:s');
		else if($this->input->post('CatalogDate') != "")
			$DateCataloged = $this->input->post('CatalogDate');

		$UpdatedAt = date('Y/m/d H:i:s');

		$holdings_record = array
		(
			'CallNumber' => $CallNumber,
			'Edition' => $Edition,
			'TitleStatement' => $TitleStatement,
			'PhysicalDescriptionEtc' => $PhysicalDescriptionEtc,
			'DissertationNote' => $Dissertation,
			'SoundCharacteristics' => $SoundCharacteristics,
			'CitationReferencesNote' => $CitationReferencesNote,
			'ProductionDistributionandYearSubmitted' => $ProductionDistributionandYearSubmitted,
			'RestrictiononAccessNote' => $RestrictiononAccessNote,
			'TypesofReportandPeriodCoveredNote' => $TypesofReportandPeriodCoveredNote,
			'CatalogDate' => $DateCataloged,
			'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
			'UpdatedAt' => $UpdatedAt,
			'CatalogSource' => $this->input->post('CatalogSource'),
			'MaterialTypeID' => $this->input->post('cboMaterialType'),
			'BroadClass' => $this->input->post('cboBroadClassification'),
			'SpecialCodedDates' => $this->input->post('SpecialCodedDates'),
			'ISBN' => $this->input->post('ISBN'),
			'ISSN' => $this->input->post('ISSN'),
			'LanguageID' => $this->input->post('cboLanguageID'),
			'AbbreviatedTitle' => $this->input->post('AbbreviatedTitle'),
			'ContentTypeID' => $this->input->post('cboContentTypeTerm'),
			'ContentTypeCode' => $this->input->post('cboContentTypeCode'),
			'ContentTypeSource' => $this->input->post('ContentTypeSource'),
			'MediaTypeID' => $this->input->post('cboMediaTypeID'),
			'MediaTypeCode' => $this->input->post('cboMediaTypeCode'),
			'MediaSource' => $this->input->post('MediaSource'),
			'CarrierTypeID' => $this->input->post('cboCarrierTypeID'),
			'CarrierTypeCode' => $this->input->post('cboCarrierTypeCode'),
			'CarrierSource' => $this->input->post('CarrierSource'),
			'DatesofPublication' => $this->input->post('DatesofPublication'),
			'TimePeriodofCreation' => $this->input->post('TimePeriodofCreation'),
			'SeriesStatementID' => $this->input->post('SeriesStatementID'),
			'SeriesStatement' => $this->input->post('SeriesStatement'),
			'VolumeSequentialDesignation' => $this->input->post('VolumeSequentialDesignation'),
			'GeneralNote' => $this->input->post('GeneralNote'),
			'BibliographicNote' => $this->input->post('BibliographicNote'),
			'FormattedContents' => $this->input->post('FormattedContents'),
			'ScopeandContent' => $this->input->post('ScopeandContent'),
			'Summary' => $this->input->post('Summary'),
			'AdditionalPhysicalFormAvailableNote' => $this->input->post('AdditionalPhysicalFormAvailableNote'),
			'AvailabilitySource' => $this->input->post('AvailabilitySource'),
			'AvailabilityConditions' => $this->input->post('AvailabilityConditions'),
			'PublicationStatus' => $this->input->post('PublicationStatus')
		);

		//Catalog Number Generation
		if($this->input->post('CatalogNumber') == '')
		{
			$ids = $this->Holdings_model->catalog_number(TRUE);
			$catalog_number=$ids->CatalogNumber;
		}
		else if ($this->input->post('CatalogNumber') != '')
		{
			$ids = $this->Holdings_model->catalog_number(FALSE);
			$catalog_number= $this->input->post('CatalogNumber');
		}

		$holdings_record['CatalogNumber'] = $catalog_number;

		//once title is changed in holdings it will reflect in tblacquisitions and holdingscopy
		$title = array
		(	
			'HoldingsID'          		=> $this->input->post('HoldingsID'),
			'Title'         			=> $this->input->post('Title')

		);

		$this->Holdings_model->update_holdings($this->input->post('HoldingsID'), $holdings_record);
		$this->Holdings_model->update_title_holdingscopy($this->input->post('HoldingsID'), $title);
		$this->Holdings_model->update_title_acquisitions($this->input->post('HoldingsID'), $title);

		if($this->input->post('PublicationStatus')== '1')
		{
			if($this->input->post('indexID')== '')
			{
				// Store publications fields entry into an array
				$indices_record = array
				( 
					'HoldingsID'          => $this->input->post('HoldingsID'),
					'Author'              => $this->input->post('Author'),
					'Publisher'           => $this->input->post('Publisher'),
					'Summary'             => $this->input->post('Summary'),
					'PublicationDate'     => $this->input->post('PublicationYear'),
					'BroadClass'          => $this->input->post('cboBroadClassification'),
					'MaterialType'        => $this->input->post('cboMaterialType'),
					'Subjects'            => $this->input->post('Subjects'),
					'Title'               => $TitleStatement2,
					'ScopeandContent'     => $this->input->post('ScopeandContent'),
				);

				$this->Holdings_model->create_indices($indices_record);
			}
			else
			{
				$indices_record = array
				( 
					'HoldingsID'          => $this->input->post('HoldingsID'),
					'Author'              => $this->input->post('Author'),
					'Publisher'           => $this->input->post('Publisher'),
					'Summary'             => $this->input->post('Summary'),
					'PublicationDate'     => $this->input->post('PublicationYear'),
					'BroadClass'          => $this->input->post('cboBroadClassification'),
					'MaterialType'        => $this->input->post('cboMaterialType'),
					'Subjects'            => $this->input->post('Subjects'),
					'Title'               => $TitleStatement2,
					'ScopeandContent'     => $this->input->post('ScopeandContent'),
				);

				$this->Holdings_model->update_indices($this->input->post('HoldingsID'),$indices_record);
			}	
		}
		else if ($this->input->post('PublicationStatus')== '0')
		{
			$this->Holdings_model->delete_indices($this->input->post('indexID'));
		}

		echo json_encode(array("status" => TRUE));
	}

	public function multimedia_create() 
	{ 
		$dir = './upload/';
		$without_extension = pathinfo(($_FILES["image_file"]["name"]), PATHINFO_FILENAME);
		$ext = pathinfo(($_FILES["image_file"]["name"]),PATHINFO_EXTENSION);
		$clearString =preg_replace("/[^\w- ]/", '',($without_extension), PATHINFO_FILENAME).'_'.$this->input->post('HoldingsID'); 
		$file = $dir . basename($clearString) .'.' . $ext;
		$fileType = strtolower(pathinfo(($without_extension),PATHINFO_EXTENSION));

		if($ext != "jpg" && $ext != "JPG" && $ext != "png" && $ext != "PNG" && $ext != "jpeg" && $ext != "JPEG" && $ext != "pdf" && $ext != "PDF" && $ext != "avi" && $ext != "AVI") 
			$type = 0;
		else 
			$type = 1;

		//limit is 50 KB
		if ($_FILES["image_file"]["size"] > 500000000 )
			$size = 0;
		else
			$size =1;

		print_r($type);
		print_r($size);

		if($type==1 && $size==1 )
		{
			if(move_uploaded_file($_FILES["image_file"]["tmp_name"], $file))
			{
				$FileName=	$clearString;
				$FileType=  $ext;
				$FileLocation= $file;
				$HoldingsID = $this->input->post('HoldingsID');

				//if multimedia ID already exist, the file will inherit the existing ID.
				if($this->input->post('MultimediaID') != '')
					$multimedia_id = $this->input->post('MultimediaID');

				$multimedia_record = array
				( 
					'HoldingsID'      => $HoldingsID,
					//removing special characters in filename
					'FileName'        => $FileName,
					'FileType'        => $FileType,
					'FileLocation'    => $FileLocation,
					'Permission'      => $this->input->post('Restriction')
				);

				if($this->input->post('MultimediaID') == "")
					$this->Holdings_model->create_multimedia($multimedia_record);
			}

		}
		else
		{
			$error = display_errors();  
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error',$error['error']);
		}
	}

	public function frontpage_update() 
	{ 
		$f_Dir = './frontpage/';
		$f_without_extension = pathinfo(($_FILES["FrontPage"]["name"]), PATHINFO_FILENAME);
		$f_Ext = pathinfo(($_FILES["FrontPage"]["name"]),PATHINFO_EXTENSION);
		$f_clearString =preg_replace("/[^\w- ]/", '',($f_without_extension), PATHINFO_FILENAME);
		$f_file = $f_Dir . basename($f_clearString).'.' . $f_Ext;
		$f_fType = strtolower($f_Ext);

		if($f_Ext != "jpg" && $f_Ext != "JPG" && $f_Ext != "png" && $f_Ext != "PNG" && $f_Ext != "jpeg" && $f_Ext != "JPEG")
			$type = 0;
		else
			$type = 1;

		if ($_FILES["FrontPage"]["size"] > 20000000)
			$size = 0;
		else
			$size =1;	
		
		// print_r($type);
		// print_r($size);

		if($type==1 && $size==1 )
		{
			$upload_image = basename($_FILES["FrontPage"]["name"]);
			$thumb_Dir = './frontpage/';
			$upload = $thumb_Dir.basename($_FILES["FrontPage"]["name"]);

			copy($_FILES["FrontPage"]["tmp_name"],$upload);

			if(move_uploaded_file($_FILES["FrontPage"]["tmp_name"], $f_file))
			{
				$FrontPageName=	$f_clearString;
				$FrontPageType=  $f_fType;
				$FrontPageLocation= $f_file;
				$HoldingsID = $this->input->post('HoldingsID');
				$AcquisitionID = $this->input->post('AcquisitionID');

				$frontpage_record = array
				( 
					'HoldingsID'           => $HoldingsID,
					'AcquisitionID'        => $AcquisitionID,
					'FrontPageName'        => $FrontPageName,
					'FrontPageType'        => $FrontPageType,
					'FrontPageLocation'    => $FrontPageLocation

				);

				if($this->input->post('FrontPageID') == "")
					$this->Holdings_model->create_frontpage($frontpage_record);
				else
					$this->Holdings_model->update_frontpage($HoldingsID,$frontpage_record);

				//create thumbnail
				$upload_image = basename($_FILES["FrontPage"]["name"]);
				$thumb_Dir = './frontpage/';
				$upload = $thumb_Dir.basename($_FILES["FrontPage"]["name"]);

				$thumb_file = $thumb_Dir . basename($_FILES["FrontPage"]["name"]);
				$nameImage = ($_FILES["FrontPage"]["name"]);

				$resize_image = $thumb_Dir.$nameImage; 
				$actual_image = $thumb_Dir.$nameImage.".jpg";

				list($width,$height) = getimagesize($resize_image);

				$newwidth = 450;
				$newheight = 700;
				$thumb = imagecreatetruecolor($newwidth, $newheight);

				if($f_fType=="jpg" || $f_fType=="JPG" || $f_fType=="JPEG" || $f_fType=="jpeg")
					$source = imagecreatefromjpeg($resize_image);
				else if($f_fType=="pdf" || $f_fType=="PDF")
					$source = imagecreatefrompsd($resize_image);
				else if($f_fType=="png" || $f_fType=="PNG")
					$source = imagecreatefrompng($resize_image);

				imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				imagejpeg( $thumb, $resize_image, 100 ); 

				$out_image=addslashes(file_get_contents($resize_image));

				(move_uploaded_file($_FILES["FrontPage"]["tmp_name"], $out_image));
			}

			echo json_encode(
				array(
					'status' => 'success',
					'message' => 'Frontpage uploaded successfully.'
				)
			);
		}
		else
		{
			echo json_encode(
				array(
					'status' => 'error',
					'message' => 'Please check file type or file size must be less than 20mb.'
				)
			);
		}
	}

	public function holdings_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->get_data();
		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;

			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			// $sub_array[] = '<a href="mdlauthor.html" data-toggle="modal" data-target="#mdlAuthor">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function author_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->author_get_data($_POST['id']);

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = $r->AuthorID;
			$sub_array[] = $r->AuthorTag;
			$sub_array[] = '<a type="text" onclick="edit_author('."'".$r->AuthorID."'".','."'".$r->AuthorTag."'".','."'".$r->HoldingsID."'".')">'."".$r->AuthorName."".'</a>';

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

	public function holdings_uncatalog_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->uncatalog_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="text" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CreatedAt;

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

	public function publications_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->publications_get_data($_POST['id']);
		$data = array();

		
		foreach($records as $r)
		{
			$sub_array = array();
			$sub_array[] = $r->PublicationID;
			$sub_array[] = '<a type="text" onclick="edit_publications('."'".$r->PublicationID."'".')">'."".$r->Publication."".'</a>';
			$sub_array[] = $r->PublicationYear;

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

	public function holdingscopy_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->holdingscopy_get_data($_POST['id']);
		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = $r->AcquisitionID;
			$sub_array[] = '<a type="text" onclick="edit_holdingscopy('."'".$r->HoldingsCopyID."'".','."'".$r->MaterialTypeID."'".')">'."".$r->CirculationNumber."".'</a>';
			$sub_array[] = $r->CopyNumber;
			$title= $r->Title;

			if(($r->MaterialTypeID)==2)
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage_holdingscopy('."'".$r->AcquisitionID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function books_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->books_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();

			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;
			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function theses_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->theses_get_data();
		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function serials_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->serials_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function nonprints_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->nonprints_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();

			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function investigatoryprojects_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->investigatoryprojects_get_data();
		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".')" class="btn bg-navy btn-xs">Full Text </a>'."  ".$r->counted;
			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".')" class="btn btn-success btn-xs">Subject</a>';
			$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".')" class="btn btn-info btn-xs">Cover Page</a>';
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

	public function verticalfiles_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->verticalfiles_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;
			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function technicalreports_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->technicalreports_get_data();
		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function reprints_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->reprints_get_data();

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = '<a type="button" onclick="edit_records('."'".$r->HoldingsID."'".')">'."".$r->HoldingsID."".'</a>';
			$sub_array[] = $r->MaterialType;
			$sub_array[] = $r->Title;
			$sub_array[] = $r->CirculationNumber;
			$sub_array[] = $r->callnumber;
			$sub_array[] = $r->CatalogNumber;
			$sub_array[] = $r->CatalogDate;
			$sub_array[] = $r->CreatedBy;
			$sub_array[] = '<a type="button" onclick="view_author('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Author</a>';
			$sub_array[] = '<a type="button" onclick="view_publications('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-default btn-xs">Publications</a>';
			$sub_array[] = '<a type="button"  onclick="view_holdingscopy('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Copy</a>';
			$sub_array[] = '<a type="button"  onclick="view_fulltext('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn bg-navy btn-xs">Attachments </a>'."  ".$r->counted;

			$sub_array[] = '<a type="button"  onclick="view_subjects('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-success btn-xs">Subject</a>';

			//Disabling uploading of front page for serials
			if(($sub_array[1] = $r->MaterialType)=="Serials")
				$sub_array[] = '<a type="button" disabled name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';
			else if(($sub_array[1] = $r->MaterialType)!="Serials")
				$sub_array[] = '<a type="button" name="update" onclick="view_frontpage('."'".$r->HoldingsID."'".','."'".str_replace("'","",$r->Title)."'".')" class="btn btn-info btn-xs">Cover Page</a>';

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

	public function subjects_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		
		$records = $this->Holdings_model->subjects_get_data($_POST['id']);

		$data = array();

		
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = $r->SubjectType;
			$sub_array[] = '<a type="text" onclick="edit_subjects('."'".$r->SubjectID."'".','."'".$r->SubjectType."'".')">'."".$r->Subject."".'</a>';

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

	public function multimedia_datatable()
	{
		
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Holdings_model->multimedia_get_data($_POST['id']);

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			$permission = array();
			$sub_array[] = $r->MultimediaID;
			$sub_array[] = $r->FileName;
			$sub_array[] = $r->FileType;
			$sub_array[] = $r->FileLocation;
			$sub_array[] = '<a href="'.base_url().$r->FileLocation.'" target="_blank"> <i class= "fa fa-file-pdf-o"></i></a>';
			$sub_array[] = '<a type="button" name="delete" onclick="delete_fulltext_records('."'".$r->MultimediaID."'".')" class="btn btn-danger btn-xs">Delete</a>';
			$permission[] = $r->Permission;

			//displaying checked and uncheck in datatable
			if(in_array(0,$permission))
				$sub_array[] = '<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'0'."'".')" checked> Viewable  <br />
				<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'2'."'".')"> Downloadable 
				<br /> <input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'1'."'".')"> Restricted ';
			else if(in_array(1,$permission))
				$sub_array[] = '<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'0'."'".')"> Viewable  <br />
				<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'2'."'".')"> Downloadable 
				<br /> <input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'1'."'".')" checked> Restricted ';
			else
				$sub_array[] = '<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'0'."'".')"> Viewable  	<br />
				<input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'2'."'".')" checked> Downloadable 
				<br /> <input type="radio" name="'."'".$r->MultimediaID."'".'" onclick="save_permission('."'".$r->MultimediaID."'".','."'".'1'."'".')" > Restricted ';

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

	public function validate_data()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = '';

		$ids = array();
		$errors = array();  

		$ids[] = "CatalogSource";
		$errors[] = "Catalog Source";

		$ids[] = "Title";
		$errors[] = "Title";

		$ids[] = "cboLanguageID";
		$errors[] = "Language Code";

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '')
			{
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function validate_data_author()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$ids[] = "cboAuthor";
		$errors[] = "Author Type";
			
		if(($this->input->post('cboAuthor'))==110)
			$ids[] = "CorporateNameorJurisdictionName110";
		else if(($this->input->post('cboAuthor'))==100)
			$ids[] = "PersonalName100";
		else if(($this->input->post('cboAuthor'))==700)
			$ids[] = "PersonalName700";
		else if(($this->input->post('cboAuthor'))==710)
			$ids[] = "CorporateNameorJurisdictionName710";
		
		$errors[] = "Name";

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '')
			{
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function validate_data_publication()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$ids[] = "Publisher";
		$errors[] = "Publisher";

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '')
			{
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function validate_data_holdingscopy()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$ids[] = "AccessionNumber";
		$errors[] = "Accession Number";

		$ids[] = "CirculationNumber";
		$errors[] = "Circulation Number";

		$ids[] = "CopyNumber";
		$errors[] = "Copy Number";

		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '')
			{
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function setholdingsid()
	{
		$this->load->library('session');
		$this->session->set_userdata('id', $_POST['id']);
		$this->session->set_userdata('title', $_POST['title']);
		echo json_encode(array("status" => TRUE));
	}

	public function setacquisitionid()
	{
		$this->load->library('session');
		$this->session->set_userdata('AcquiID', $_POST['AcquiID']);
		$this->session->set_userdata('title', $_POST['title']);
		echo json_encode(array("status" => TRUE));
	}

	public function delete()
	{
		$holdings_record = array
		(
			'IsDeleted' => 1,
			'IsActive' => 0
		);

		$id=$_POST['id'];

		$this->Holdings_model->delete_holdings( $id, $holdings_record);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_authors()
	{
		$id=$_POST['id'];
		$HoldingsID= $_POST['hid'];

		$this->Holdings_model->delete_authors($id);

		//For updating table indices
		$output2 =  array();
		$data1 = $this->Holdings_model->indices_edit($HoldingsID);
		$data2 = $this->Holdings_model->holdings_edit($HoldingsID);

		foreach($data1 as $row)  
		{ 
			$Author = $row->Author;
		}

		foreach($data2 as $row) 
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1")
			$this->Holdings_model->update_indices_author($HoldingsID, $Author);

		echo json_encode(array("status" => TRUE));
	}

	public function delete_publications()
	{
		$id=$_POST['id'];
		$HoldingsID= $_POST['hid'];

		$this->Holdings_model->delete_publications( $id);

		//For updating table indices
		$output2 =  array();
		$data1 = $this->Holdings_model->indices_edit($HoldingsID);
		$data2 = $this->Holdings_model->holdings_edit($HoldingsID);

		foreach($data1 as $row)  
		{ 
			$Publisher = $row->Publisher;
		}

		foreach($data2 as $row)  
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1")
			$this->Holdings_model->update_indices_publications($HoldingsID, $Publisher);

		echo json_encode(array("status" => TRUE));
	}

	public function delete_holdingscopy() 
	{
		$id=$_POST['id'];

		$this->Holdings_model->delete_holdingscopy($id);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_subjects() 
	{
		$id=$_POST['id'];
		$HoldingsID= $_POST['hid'];

		$this->Holdings_model->delete_subjects($id);
		echo json_encode(array("status" => TRUE));

		//For updating table indices
		$output2 =  array();
		$data1 = $this->Holdings_model->indices_edit($HoldingsID);
		$data2 = $this->Holdings_model->holdings_edit($HoldingsID);

		foreach($data1 as $row)  
		{ 
			$Subjects = $row->SubjectHeading;
		}

		foreach($data2 as $row)  
		{ 
			$output2['PublicationStatus'] = $row->PublicationStatus;
		}

		if($output2['PublicationStatus'] == "1") 
			$this->Holdings_model->update_indices_subjects($HoldingsID, $Subjects);
	}

	public function delete_fulltext() 
	{
		$output =  array();
		$id=$_POST['id'];
		$fulltext = $this->Holdings_model->multimedia_edit($id);

		foreach($fulltext as $row)  
		{ 
			$output['FileLocation'] = $row->FileLocation;
		}

		$FileLocation=$output['FileLocation'];

		$this->Holdings_model->delete_fulltext($id,$FileLocation);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_frontpage() 
	{
		$output =  array();
		$id=$_POST['id'];
		$frontpage = $this->Holdings_model->frontpage_edit($id);

		foreach($frontpage as $row) 
		{ 
			$output['FrontPageLocation'] = $row->FrontPageLocation;
			$output['FrontPageName']	 = $row->FrontPageName;
			$output['FrontPageType']	 = $row->FrontPageType;
		}

		$FrontPageLocation=$output['FrontPageLocation'];
		$Thumb="./thumbnail/".$output['FrontPageName'].".".$output['FrontPageType'];

		$this->Holdings_model->delete_frontpage($id,$FrontPageLocation,$Thumb);
		echo json_encode(array("status" => TRUE));
	}

	
}
?>