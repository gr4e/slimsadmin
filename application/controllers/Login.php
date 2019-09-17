<?php
	class Login extends CI_Controller 
	{
		public function __construct() 
		{
			parent::__construct();   
		} 

		public function index()
		{
			$this->load->view('admin/login');
		}

		public function login()
		{
			$data = array
			(
				'UserName' => $this->input->post('txtUsername'),
				'Password' => $this->input->post('txtPassword')
			);

			echo json_encode($this->Accounts_model->login($data));

			// $output = array();

			// $data = $this->Accounts_model->get_usernames();

			// foreach($data as $row)
			// {
			// 	$output['UserID'] = $row->id;
			// 	$output['Username'] = $row->uname;   
			// 	$output['Password'] = $row->pass_decrypt;  
			// 	$output['RoleID'] = $row->level;
			// 	$output['GroupID'] = $row->groupid; 
			// 	$output['Agency'] = $row->agencycode; 
			// 	$output['Status'] = $row->status;
			// 	$output['LastLogin'] = $row->lastlogin;
			// 	$output['LoginCount'] = $row->logincount;
			// 	$output['LoginStatus'] = $row->loginstatus; 
			// 	$output['CreatedBy'] = $row->createdby;  
			// 	$output['CreatedAt'] = $row->date_created;

			// 	$create_user = $this->Accounts_model->create_user($output);
			// }
		}

		

		public function logout()
		{
			$this->Accounts_model->logout();
			redirect('');
		}
	}
