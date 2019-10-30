<?php
class Circulations_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Accounts_model");
		$this->load->model("Rsrv_model");
		$this->load->library('pagination');
	}

	function Reservation($datax = NULL){

		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['roles'] = $this->Accounts_model->get_roles_dropdown();
		$data['groups'] = $this->Accounts_model->get_groups_dropdown();
		// $data['agencies'] = $this->Accounts_model->get_agencies_dropdown();

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

		//datas that are not in the template
		//pagination

		$config = array();
		$config['base_url'] = site_url("Circulations_controller/Reservation");
		$config['total_rows'] = $this->Rsrv_model->GET_rsrvtnList_count();
		$config['per_page'] = "5";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"]/$config["per_page"];
		$config["num_links"] = 4;

		// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['show_count'] = TRUE;
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// get books list
		$data['rsrvtnList'] = $this->Rsrv_model->GET_rsrvtnList($config['per_page'], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		$data['msg'] = $datax;

		$this->load->template('circulation/reservations', $data, $page);
	}



	function rsrvtnStackList(){

		$rsrvtnID = $this->input->post('rsrvtnID');

		$output = '';
		$accrd = '';
		$circOutput = '';
		$result = $this->Rsrv_model->GET_rsrvtnStackList($rsrvtnID);

		for ($i=0; $i < count($result) ; $i++) {
			$CircResult = $this->Rsrv_model->GET_HoldingsCopies_Circulation($result[$i]->HoldingsID);
			$circOutput = '';

			if (empty($CircResult)) {
				$circOutput = "<span>There are no available copies.</span>";
				$style4Copy = "background-color: #ff2100; color:#FFF;";
			}else{

			for ($x=0; $x < count($CircResult) ; $x++) {
				$style4Copy = "background-color: #5fc908; color:#000;";
					$circOutput .= "<label class='container'>".$CircResult[$x]->CirculationNumber."
					<input type='radio' checked='checked' value='".$CircResult[$x]->CirculationNumber."' class='form-radio' name='matCir".($i+1)."'>
					<span class='checkmark'></span>
					</label>";

			}

		}

			$output .= " <div class='panel panel-default'>
			<div class='panel-heading' style='".$style4Copy."'>
			<h4 class='panel-title'>
			<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>
			".$result[$i]->HoldingsID." == ".$result[$i]->Title."</a>
			</h4>

			<input type='hidden' value='".$result[$i]->HoldingsID."' name='matHd".($i+1)."' />
			</div>
			<div id='collapse".$i."' class='panel-collapse collapse'>
			<div class='panel-body'>
			".$circOutput."
			</div>
			</div>
			</div>
			";

		}

		$accrd .= "<form action='".base_url()."index.php/Circulations_controller/serve_Reservation' method='POST'><div class='panel-group' id='accordion'>".$output."</div><hr />
		<input type='hidden' value='".count($result)."' name='materialCount' />
		<input type='hidden' value='".$result[0]->UserID."' name='UserIDPt' />
		<input type='hidden' value='".$result[0]->rsrvID."' name='rsrvID' />
		<input type='submit' value='Serve' class='btn btn-primary' />
		</form>";


		$data['rsrvStackList'] = $accrd;

		echo json_encode($data);

	}



	function serve_Reservation(){

		$matCpArray = array();
		$matHdAarray = array();

		$rsrvID = $this->input->post('rsrvID');
		$matCount = $this->input->post('materialCount');
		$UserIDPt = $this->input->post('UserIDPt');
		$UserIDLb = $this->Accounts_model->get_session_data('UserID');


		//array for HoldingsID
		for ($i=0; $i < $matCount ; $i++) {
			array_push($matHdAarray, $this->input->post('matHd'.($i+1)));
		}

		//array for Circulation Number
		for ($i=0; $i < $matCount ; $i++) {
			array_push($matCpArray, $this->input->post('matCir'.($i+1)));
		}

		$this->Rsrv_model->INSERT_bwrdMat($UserIDLb, $UserIDPt, $matHdAarray, $matCpArray, $rsrvID);

		$datax = '1';

		$this->Reservation($datax);


	}



	//RETURNS

	function returns(){

		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['roles'] = $this->Accounts_model->get_roles_dropdown();
		$data['groups'] = $this->Accounts_model->get_groups_dropdown();
		// $data['agencies'] = $this->Accounts_model->get_agencies_dropdown();

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




		//datas that are not in the template
		//pagination

		$config = array();
		$config['base_url'] = site_url("Circulations_controller/Returns");
		$config['total_rows'] = $this->Rsrv_model->GET_returnmat_count();
		$config['per_page'] = "5";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"]/$config["per_page"];
		$config["num_links"] = 4;

		// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['show_count'] = TRUE;
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// get books list
		$data['returnList'] = $this->Rsrv_model->GET_returnmat($config['per_page'], $data['page']);

		$data['pagination'] = $this->pagination->create_links();




		$this->load->template('circulation/returns', $data, $page);


	}



	function returnList(){
		$brwdID = $this->input->post('brwdID');
		$output = '';
		$result = $this->Rsrv_model->returnList($brwdID);

		for ($i=0; $i < count($result) ; $i++) {
			$output .= "<div class='rtrnDiv' style='width:100%;'><table class='table' style='width:100%;'>
			<tr><td colspan='2' class='bg-primary'><label class='container' style='margin-bottom: 0;'>".$result[$i]->CirculationNumber."<input type='checkbox' class='chkBox' value='".$result[$i]->CirculationNumber."'>
			<span class='checkmark'></span></label></td></tr>
			<tr><td class='bg-info' style='width:12%;'>".$result[$i]->HoldingsID."</td><td class='bg-success' style='width:88%;'>".$result[$i]->Title."</td></tr>
			</table></div>";
		}

		$data['retnList'] = $output . "<hr /><button class='btn btn-success' onclick=accptRtrn('".$brwdID."') >Accept Return</button>";

		echo json_encode($data);

	}


	function returnMaterialChngStatus(){
		$UserID = $this->Accounts_model->get_session_data('UserID');
		$brwdID = $this->input->post('brwdID');
		$chckedMats = $this->input->post('chckedMats');
		$matArrWhere = " WHERE ";
		$matArr = explode(" ", $chckedMats);

		for ($i=0; $i < count($matArr) ; $i++) {
			$matArrWhere .= "CirculationNumber='".$matArr[$i]."' OR ";
		}

		$result = $this->Rsrv_model->UPDATE_returnMaterial(substr($matArrWhere, 0 ,-28), $brwdID, $UserID);

		if($result == 0){
			$this->Rsrv_model->UPDATE_brwdHdReturnStat($brwdID);
		}

		$data['testing'] = '1';

		echo json_encode($data);


	}






}//end of circulation controller
