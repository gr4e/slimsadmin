<?php
class Suggestions_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	function GET_SuggestionListRange($dateFrom, $dateTo){
		$query = $this->db->query("SELECT fbID, optionalTxt, IF (ISNULL(feedback.FullName), (SELECT users.FullName FROM users WHERE users.UserID = feedback.fbBy), feedback.FullName) as ClientName, fbDate
		FROM feedback WHERE optionalTxt <> '' AND optionalTxt IS NOT NULL AND (fbDate BETWEEN '".$dateFrom."' AND '".$dateTo."') ");

		return $query->result();
	}

}?>
