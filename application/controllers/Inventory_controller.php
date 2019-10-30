<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Inventory_model');
    $this->load->model('Accounts_model');
  }


  function material_inventory(){

    $user = $this->Accounts_model->get_session_data('UserName');

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


    $this->load->template('inventory/inventory_mod', $data, $page);

  }


  function InvStackList(){

    $UserID = $this->Accounts_model->get_session_data('UserID');

    $invStackResult = $this->Inventory_model->GET_invStackList($UserID);

    $data['data'] = $invStackResult;
    // $data['data'] = array();
    //
    // for ($i=0; $i < count($invStackResult) ; $i++) {
    //   $tempArr = array(
    //     'InvID' => $invStackResult[$i]->InvID,
    //     'CirculationNumber' => $invStackResult[$i]->CirculationNumber,
    //     'HoldingsID' => $invStackResult[$i]->HoldingsID,
    //     'Title' => $invStackResult[$i]->Title,
    //     'InvDate' => $invStackResult[$i]->InvDate,
    //     'invStatus' => $invStackResult[$i]->invStatus,
    //     "gnrteSelect" => "<select class='form-control'>
    //     <option value='available'>available</option>
    //     <option value='missing'>missing</option>
    //     <option value='loan'>loan</option>
    //     <option value='for repair'>for repair</option>
    //     <option value='for digitization'>for digitization</option>
    //     </select>"
    //   );
    //
    // array_push($data['data'], $tempArr);
    // }

    echo json_encode($data);

  }


  function changeInvStatus(){
    $CirculationNumber = $this->input->post('CirculationNumber');
    $statusChange2 = $this->input->post('statusChange2');

    $invStatDetails = array(
      'CirculationNumber' => $CirculationNumber,
      'statusChange2' => $statusChange2
    );

    $this->Inventory_model->UPDATE_invStatusRow($invStatDetails);

    return;
  }



  function insert2InvStack(){
    $circNo = $this->input->post('barcodeText');

    $ifExistInvStck = $this->Inventory_model->BOOL_ifExistInvStck($circNo);

    if ($ifExistInvStck == 1) {
      $data['msg'] = "2";
    }else{
      $matDetails = $this->Inventory_model->GET_matDetails($circNo);

      $invStckData = array(
        'CirculationNumber' => $matDetails->CirculationNumber,
        'HoldingsID' => $matDetails->HoldingsID,
        'UserID' => $this->Accounts_model->get_session_data('UserID')
      );

      $this->Inventory_model->INSERT_invStck($invStckData);

      $data['msg'] = '1';
    }




    echo json_encode($data);

  }



  function commit2inventory(){

    $circIDsRaw = $this->input->post('CircIDs');

    $circIDs = explode(',', $circIDsRaw);

    for ($i=0; $i < count($circIDs) ; $i++) {
      $HoldingsID = $this->Inventory_model->GET_InvStckDetails($circIDs[$i])->HoldingsID;
      $CirculationNumber = $this->Inventory_model->GET_InvStckDetails($circIDs[$i])->CirculationNumber;
      $invStatus = $this->Inventory_model->GET_InvStckDetails($circIDs[$i])->invStatus;

      $invComData = array(
        'InventoryDate' => date("Y-m-d H:i:s"),
        'CirculationNumber' => $CirculationNumber,
        'HoldingsID' => $HoldingsID,
        'UserID' => $this->Accounts_model->get_session_data('UserID'),
        'Remarks' => $invStatus,
        'Result' => '',
        'Tag' => ''
      );

      $this->Inventory_model->INSERT_inventorytbl($invComData);
      $this->Inventory_model->UPDATE_invStatus($CirculationNumber);

      $this->Inventory_model->DELETE_CirInvStck($circIDs[$i]);
    }

    $data['msg'] = '1';

    echo json_encode($data);

  }



  function removeFromInvStck(){
    $circIDsRaw = $this->input->post('CircIDs');

    $circIDs = explode(',', $circIDsRaw);


    for ($i=0; $i < count($circIDs) ; $i++) {
      $this->Inventory_model->DELETE_CirInvStck($circIDs[$i]);
    }

    $data['msg'] = '1';

    $data['circIDsRaw'] = $circIDsRaw;
    echo json_encode($data);

  }







}
