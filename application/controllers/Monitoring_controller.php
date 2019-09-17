<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Monitoring_controller extends CI_Controller 
	{
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

			$data['titles'] = $this->Monitoring_model->get_titles();
			$data['stitles'] = $this->Monitoring_model->get_stitles();

			$this->load->template('acquisitions/monitor-serial-material', $data, $page);
		}

		public function load_acquimode()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_acquimode($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['FreqDate2'] = $r->FreqDate2;
				$sub_array['AcquisitionID'] = $r->AcquisitionID;
				$sub_array['FreqDate'] = $r->FreqDate;
				$sub_array['Source'] = $r->Source;
				$sub_array['IssueNumber'] = $r->IssueNumber;
				$sub_array['Frequency'] = $r->Frequency;
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

		public function load_daily()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_daily($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
				$sub_array['col4'] = $r->col4;
				$sub_array['col5'] = $r->col5;
				$sub_array['col6'] = $r->col6;
				$sub_array['col7'] = $r->col7;
				$sub_array['col8'] = $r->col8;
				$sub_array['col9'] = $r->col9;
				$sub_array['col10'] = $r->col10;
				$sub_array['col11'] = $r->col11;
				$sub_array['col12'] = $r->col12;
				$sub_array['col13'] = $r->col13;
				$sub_array['col14'] = $r->col14;
				$sub_array['col15'] = $r->col15;
				$sub_array['col16'] = $r->col16;
				$sub_array['col17'] = $r->col17;
				$sub_array['col18'] = $r->col18;
				$sub_array['col19'] = $r->col19;
				$sub_array['col20'] = $r->col20;
				$sub_array['col21'] = $r->col21;
				$sub_array['col22'] = $r->col22;
				$sub_array['col23'] = $r->col23;
				$sub_array['col24'] = $r->col24;
				$sub_array['col25'] = $r->col25;
				$sub_array['col26'] = $r->col26;
				$sub_array['col27'] = $r->col27;
				$sub_array['col28'] = $r->col28;
				$sub_array['col29'] = $r->col29;
				$sub_array['col30'] = $r->col30;
				$sub_array['col31'] = $r->col31;
				$sub_array['col32'] = $r->col32;
				$sub_array['col33'] = $r->col33;
				$sub_array['col34'] = $r->col34;
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

		public function load_weekly()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_weekly($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
				$sub_array['col4'] = $r->col4;
				$sub_array['col5'] = $r->col5;
				$sub_array['col6'] = $r->col6;
				$sub_array['col7'] = $r->col7;
				$sub_array['col8'] = $r->col8;
				$sub_array['col9'] = $r->col9;
				$sub_array['col10'] = $r->col10;
				$sub_array['col11'] = $r->col11;
				$sub_array['col12'] = $r->col12;
				$sub_array['col13'] = $r->col13;
				$sub_array['col14'] = $r->col14;
				$sub_array['col15'] = $r->col15;
				$sub_array['col16'] = $r->col16;
				$sub_array['col17'] = $r->col17;
				$sub_array['col18'] = $r->col18;
				$sub_array['col19'] = $r->col19;
				$sub_array['col20'] = $r->col20;
				$sub_array['col21'] = $r->col21;
				$sub_array['col22'] = $r->col22;
				$sub_array['col23'] = $r->col23;
				$sub_array['col24'] = $r->col24;
				$sub_array['col25'] = $r->col25;
				$sub_array['col26'] = $r->col26;
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

		public function load_monthly()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_monthly($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
				$sub_array['col4'] = $r->col4;
				$sub_array['col5'] = $r->col5;
				$sub_array['col6'] = $r->col6;
				$sub_array['col7'] = $r->col7;
				$sub_array['col8'] = $r->col8;
				$sub_array['col9'] = $r->col9;
				$sub_array['col10'] = $r->col10;
				$sub_array['col11'] = $r->col11;
				$sub_array['col12'] = $r->col12;
				$sub_array['col13'] = $r->col13;
				$sub_array['col14'] = $r->col14;
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

		public function load_quarterly()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_quarterly($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
				$sub_array['col4'] = $r->col4;
				$sub_array['col5'] = $r->col5;
				$sub_array['col6'] = $r->col6;
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

		public function load_Semiannually()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_Semiannually($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
				$sub_array['col4'] = $r->col4;
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

		public function load_yearly()
		{
		    // Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

		    // Get records
			$records = $this->Monitoring_model->get_yearly($_POST['title'], $_POST['stitle'], $_POST['fromyear'], $_POST['toyear'], $_POST['search']);

			$data = array();

		    // Store records into sub_array
			foreach($records as $r) 
			{
				$sub_array = array();
				$sub_array['col1'] = $r->col1;
				$sub_array['col2'] = $r->col2;
				$sub_array['col3'] = $r->col3;
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
				'ModuleFeature' => 'Monitoring of Serial Materials',
				'Transaction' => $id,
				'IP' => $this->input->ip_address()
			);

			$this->Monitoring_model->create_log($log_record);
			echo json_encode(array("status" => TRUE));
		}
	}
