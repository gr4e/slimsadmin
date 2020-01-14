<?php
class Suggestions_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Accounts_model");
    $this->load->model('Suggestions_model');
  }


  function SuggestionsReport($data = NULL){

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


    $this->load->template('feedback/SuggestionsReport', $data, $page);

  }


  function GenerateSuggestions(){
    $outputData = "";
    $dateRange = $this->input->post('daterange');

    $dateFrom = date('Y-m-d',strtotime(substr($dateRange, 0, 10)));
    $dateTo = date('Y-m-d',strtotime(substr($dateRange, 13, 10)));

    $SuggestionListResult = $this->Suggestions_model->GET_SuggestionListRange($dateFrom, $dateTo);

    for ($i=0; $i < count($SuggestionListResult) ; $i++) {
      $outputData .= "<tr><td>".$SuggestionListResult[$i]->ClientName."</td>
      <td>".$SuggestionListResult[$i]->optionalTxt."</td>
      <td>".$SuggestionListResult[$i]->fbDate."</td></tr>";
    }

    $data['Suggestionlist'] = $outputData;

    $this->SuggestionsReport($data);

  }


} ?>
