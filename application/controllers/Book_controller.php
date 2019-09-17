<?php
	class Book_controller extends CI_Controller {
		public function __construct() 
		{
			parent::__construct();   
		} 

		public function index()
		{
			if(!$this->Accounts_model->get_session_data('UserName'))
			{
				redirect('');
			}

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

			$this->load->template('acquisitions/accession-book', $data, $page);
		}

		// Load data into Datatable
		public function load_table()
		{
	    	// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

	    	// Get records
			$records = $this->Book_model->get_book($this->Accounts_model->get_session_data('UserName'), $this->Accounts_model->get_session_data('RoleID'));

			$data = array();

	    	// Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array[] = $r->txtHoldingsID;
				$sub_array[] = $r->txtAcquisitionID;
				$sub_array[] = $r->cboMaterialType;
				$sub_array[] = $r->txtISBN_ISSN;
				$sub_array[] = $r->txtClassificationNum . " " . $r->txtAuthorNum . " " . $r->txtCopyrightDate;
				$sub_array[] = $r->txtAuthor;
				$sub_array[] = $r->txtTitle;
				$sub_array[] = $r->txtAccessionNum;
				$sub_array[] = $r->txtCirculationNum;
				$sub_array[] = $r->txtEdition;
				$sub_array[] = $r->cboImprintType;
				$sub_array[] = $r->txtPublisher;
				$sub_array[] = $r->txtPublicationPlace;
				$sub_array[] = $r->txtPublicationDate;
				$sub_array[] = $r->txtExtent;
				$sub_array[] = $r->txtOtherPhysical;
				$sub_array[] = $r->txtDimensions;
				$sub_array[] = $r->txtFrequency;
				$sub_array[] = $r->txtVolume;
				$sub_array[] = $r->txtIssueDate;
				$sub_array[] = $r->txtIssueNum;
				$sub_array[] = $r->txtSeriesStatement;
				$sub_array[] = $r->txtBibliographicNote;
				$sub_array[] = $r->cboAcquiMode;
				$sub_array[] = $r->txtDateAcquired;
				$sub_array[] = $r->txtCost;
				$sub_array[] = $r->txtSource;
				$sub_array[] = $r->txtUseRestrictions;
				$sub_array[] = $r->txtItemStatus;
				$sub_array[] = $r->txtTempLocation;
				$sub_array[] = $r->txtNonpublic;
				$sub_array[] = $r->txtCopyNum;

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

		public function create_log($id)
		{
			$acquisitionholdings_id = '';

			$log_record = array
			(
				'ID' => $acquisitionholdings_id,
				'Username' => $this->Accounts_model->get_session_data('UserName'),
				'Module' => 'Acquisition',
				'ModuleFeature' => 'Accession Record Book',
				'Transaction' => $id,
				'IP' => $this->input->ip_address()
			);

			$this->Book_model->create_log($log_record);
			echo json_encode(array("status" => TRUE));
		}
	}
