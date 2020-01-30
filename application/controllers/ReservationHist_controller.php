<?php
class ReservationHist_controller extends CI_Controller
{
  public function __construct()	{
    parent::__construct();
    $this->load->model("ReservationHist_model");
  }



  function ReservationHistory($data = NULL){

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


    $this->load->template('circulation/ReservationHistory', $data, $page);

  }


  function GenerateReservationHistory(){

    $outputData = "";
    $dateRange = $this->input->post('daterange');

    $dateFrom = date('Y-m-d',strtotime(substr($dateRange, 0, 10)));
    $dateTo = date('Y-m-d',strtotime(substr($dateRange, 13, 10)));

    $rsrvtnHst = $this->ReservationHist_model->GET_reservationHistory($dateFrom, $dateTo);

    for ($i=0; $i < count($rsrvtnHst) ; $i++) {

      switch ($rsrvtnHst[$i]->servedStatus) {
        case "0":
        $serveStatus = "<span style='color:#283fed;'>Unserved</span>";
        break;

        case "1":
        $serveStatus = "<span style='color:#03a803;'>Served</span>";
        break;

        case "2":
        $serveStatus = "<span style='color:#ab299e;'>Canceled</span>";
        break;

        case "3":
        $serveStatus = "<span style='color:#990303;'>Expired</span>";
        break;

        default:
        break;
      }

      $outputData .= "<tr><td><span style='size:20px; font-weight:bold;'>".$rsrvtnHst[$i]->rsrvID." -- Reserved By: ".$rsrvtnHst[$i]->FullName."</span></td>
      <td style='padding-left:30px;'>".$rsrvtnHst[$i]->HoldingsID." </td>
      <td>".substr($rsrvtnHst[$i]->Title, 0, 100)."</td>
      <td>".substr($rsrvtnHst[$i]->rsrvDate, 0, 11)."</td>
      <td>".$serveStatus."</td>
      <td>".$rsrvtnHst[$i]->LibrarianName."</td></tr>";
    }

    $data['RsrvtnHist'] = $outputData;

    $this->ReservationHistory($data);


  }



} //end of controller
