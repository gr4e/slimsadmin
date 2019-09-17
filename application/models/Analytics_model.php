<?php
class Analytics_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_serial()
	{
		$sql = 'SELECT DISTINCT a.HoldingsID, CASE WHEN a.Title = "" THEN b.SeriesStatement ELSE a.Title END AS Title FROM tblholdingscopy a LEFT JOIN tblholdings b ON b.HoldingsID = a.HoldingsID WHERE b.MaterialTypeID = 2 AND a.IsActive = 1';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_serial2($title)
	{
		// $sql = 'SELECT DISTINCT a.HoldingsID, CASE WHEN a.Title = "" THEN b.SeriesStatement ELSE a.Title END AS Title FROM tblholdingscopy a LEFT JOIN tblholdings b ON b.HoldingsID = a.HoldingsID WHERE b.MaterialTypeID = 2 AND a.IsActive = 1 AND a.Title LIKE ?';
		// if($title == 'all')
		// 	$sql = 'SELECT DISTINCT a.HoldingsID, CASE WHEN a.Title = "" THEN b.SeriesStatement ELSE a.Title END AS Title FROM tblholdingscopy a LEFT JOIN tblholdings b ON b.HoldingsID = a.HoldingsID WHERE b.MaterialTypeID = 2 AND a.IsActive = 1';
		// $query = $this->db->query($sql, $title);
		// return $query->result_array();

		// $this->db->distinct();
		$this->db->select("DISTINCT a.HoldingsID, CONCAT(LEFT((CASE WHEN a.Title = '' THEN b.SeriesStatement ELSE a.Title END),40), (CASE WHEN CHAR_LENGTH((CASE WHEN a.Title = '' THEN b.SeriesStatement ELSE a.Title END)) >= 40 THEN '.....' ELSE '' END)) AS Title", FALSE);
		$this->db->from("tblholdingscopy a");
		$this->db->join("tblholdings b", "a.HoldingsID = b.HoldingsID", "left");
		$this->db->where("b.MaterialTypeID", 2);
		$this->db->where("a.CopyNumber", "c1");
		$this->db->where("a.IsActive", 1);
		$title != "-all" ? $this->db->like("a.Title", $title, "both") : $this->relax();
		$result = $this->db->get()->result_array();

        return $result;
	}

	public function get_volume()
	{
		$query = $this->db->query('SELECT DISTINCT HoldingsID, Title, Volume FROM tblholdingscopy WHERE CopyNumber IN ("1", "c1", "C1") AND Frequency != "" ORDER BY HoldingsID, Volume');
		return $query->result_array();
	}

	public function get_issue()
	{
		$query = $this->db->query('SELECT DISTINCT HoldingsID, Title, Volume, IssueNumber FROM tblholdingscopy WHERE CopyNumber IN ("1", "c1", "C1") AND Frequency != "" Order by HoldingsID, Volume, IssueNumber');
		return $query->result_array();
	}

	public function get_locations()
	{
		$sql = 'SELECT LocationID, Location FROM tbllocation WHERE MaterialTypeID = 2';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_analytics()
	{
		$query = $this->db->query('SELECT DISTINCT b.AnalyticsID, a.HoldingsID, a.Title, a.Volume, a.IssueNumber, b.Title FROM tblholdingscopy a JOIN tblanalytics b on b.HoldingsID = a.HoldingsID and b.HoldingsCopyID = a.HoldingsCopyID WHERE a.CopyNumber IN ("1", "c1", "C1") AND a.Frequency != ""Order by a.HoldingsID, a.Volume, a.IssueNumber');
		return $query->result_array();
	}

	public function get_languages()
	{
		$query = $this->db->query('SELECT * FROM tbllanguage');
		return $query->result_array();
	}

	public function get_broadclasses()
	{
		$query = $this->db->query('SELECT * FROM tblbroadclass');
		return $query->result_array();
	}

	public function get_mediaterms()
	{
		$query = $this->db->query('SELECT * FROM tblmediatype');
		return $query->result_array();
	}
	
	public function get_mediacodes()
	{
		$query = $this->db->query('SELECT * FROM tblmediatype');
		return $query->result_array();
	}

	public function get_materialtypes()
	{
		$query = $this->db->query('SELECT * FROM tblmaterials');
		return $query->result_array();
	}

	public function get_volume_dropdown($id)
	{
		$sql = 'SELECT DISTINCT HoldingsID, Volume FROM tblholdingscopy WHERE HoldingsID = ? AND CopyNumber IN ("c1", "1", "C1") ORDER BY Volume';
		$query = $this->db->query($sql, $id);
		return $query->result_array();
	}

	public function get_issue_dropdown($id, $vol)
	{
		$sql = 'SELECT DISTINCT HoldingsID, IssueNumber FROM tblholdingscopy WHERE HoldingsID = ? AND Volume = ? AND CopyNumber IN ("c1", "1", "C1") ORDER BY IssueNumber';
		$query = $this->db->query($sql, array($id, $vol));
		return $query->result_array();
	}

	public function get_analytics_ids($serial, $volume, $issue)
	{
		$sql = 'SELECT HoldingsCopyID, HoldingsID FROM tblholdingscopy WHERE Title = ? and Volume = ? and IssueNumber = ? and CopyNumber in ("1", "c1", "C1")';
		$query = $this->db->query($sql, array($serial, $volume, $issue));
		$result = $query->row();
		return $result;
	}

	public function generate_catalognum()
	{
		$query = $this->db->query("SELECT CONCAT(id,LPAD(counter+1, 6, '0')) as catnum FROM tblid_sequence WHERE id = 'STII-C'");
    	return $query->row();
	}

	public function load_analytics($holdingsid, $volume, $issuenum)
	{
		$sql = 'SELECT a.AnalyticsID, CASE WHEN a.Title LIKE "%$a%" THEN (CASE 
		    WHEN a.Title LIKE "%$b%" 
		    OR a.Title LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.Title,"$a",-1)),"$",1)
		    ELSE SUBSTRING_INDEX(a.Title,"$a",-1) END) ELSE "" END AS Title FROM tblanalytics a LEFT JOIN tblholdingscopy b ON b.HoldingsCopyID = a.HoldingsCopyID WHERE a.HoldingsID = ? AND b.Volume = ? AND b.IssueNumber = ?';
        $query = $this->db->query($sql, array($holdingsid, $volume, $issuenum));
        return $query->result();
	}

	public function load_viewall($holdingsid)
	{
		// $this->db->select("a.Volume, a.IssueNumber, CASE WHEN b.Title LIKE '%$a%' THEN (CASE WHEN b.Title LIKE '%$b%' OR b.Title LIKE '%$c%' THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.Title,'$a',-1)),'$',1) ELSE SUBSTRING_INDEX(b.Title,'$a',-1) END) ELSE '' END AS Title", FALSE);
		// $this->db->from("tblholdingscopy a");
		// $this->db->join("tblanalytics b", "a.HoldingsCopyID = b.HoldingsCopyID", "left");
		// $this->db->where("a.HoldingsID", $holdingsid);
		// $this->db->order_by("a.Volume", "a.IssueNumber", "b.HoldingsCopyID");
		// $result = $this->db->get()->result_array();

  		//       return $result;

        $sql = 'SELECT a.Volume, a.IssueNumber, CASE WHEN b.Title LIKE "%$a%" THEN (CASE WHEN b.Title LIKE "%$b%" OR b.Title LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.Title,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(b.Title,"$a",-1) END) ELSE "" END AS Title FROM tblholdingscopy a LEFT JOIN tblanalytics b ON b.HoldingsCopyID = a.HoldingsCopyID WHERE a.HoldingsID = ? ORDER BY a.Volume, a.IssueNumber, b.HoldingsCopyID;';
        $query = $this->db->query($sql, $holdingsid);
        return $query->result();

        // $sql = 'CALL sp_viewallanalytics(?);';
        // $query = $this->db->query($sql, array($holdingsid));
        // return $query->result();
	}

	public function load_authors($id)
	{
		$sql = 'SELECT HoldingsID AS AnalyticsID, AuthorID, AuthorTag, 
		CASE WHEN AuthorTag = "100" OR AuthorTag = "700" THEN (CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%"
        OR AuthorName LIKE "%$c%" 
        OR AuthorName LIKE "%$e%" 
        OR AuthorName LIKE "%$d%" 
        OR AuthorName LIKE "%$q%"
        OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END) 
        WHEN AuthorTag = "110" THEN (CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%"
        OR AuthorName LIKE "%$c%" 
        OR AuthorName LIKE "%$d%" 
        OR AuthorName LIKE "%$n%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END) 
        ELSE (CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%"
        OR AuthorName LIKE "%$c%" 
        OR AuthorName LIKE "%$d%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END) 
        END AS AuthorName FROM tblauthors WHERE HoldingsID = ?';
        $query = $this->db->query($sql, $id);
        return $query->result();
	}

	public function load_subjects($id)
	{
		$sql = 'SELECT HoldingsID AS AnalyticsID, SubjectID, SubjectType, 
		CASE WHEN SubjectType = "600" THEN (CASE WHEN Subject LIKE "%$a%" THEN (CASE 
        WHEN Subject LIKE "%$c%"
        OR Subject LIKE "%$x%" 
        OR Subject LIKE "%$v%" 
        OR Subject LIKE "%$y%" 
        OR Subject LIKE "%$z%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END)

        WHEN SubjectType = "610" THEN (CASE WHEN Subject LIKE "%$a%" THEN (CASE
        WHEN Subject LIKE "%$b%"
        OR Subject LIKE "%$x%" 
        OR Subject LIKE "%$v%" 
        OR Subject LIKE "%$y%" 
        OR Subject LIKE "%$z%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END) 

        WHEN SubjectType = "611" THEN (CASE WHEN Subject LIKE "%$a%" THEN (CASE
        WHEN Subject LIKE "%$d%"
        OR Subject LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END) 

        WHEN SubjectType = "630" OR "651" THEN (CASE WHEN Subject LIKE "%$a%" THEN (CASE
        WHEN Subject LIKE "%$x%"
        OR Subject LIKE "%$v%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END) 

        ELSE (CASE WHEN Subject LIKE "%$a%" THEN (CASE
        WHEN Subject LIKE "%$x%" 
        OR Subject LIKE "%$v%" 
        OR Subject LIKE "%$y%" 
        OR Subject LIKE "%$z%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END) 

        END AS Subject FROM tblsubjects WHERE HoldingsID = ?';
        $query = $this->db->query($sql, $id);
        return $query->result();
	}

	public function load_attachments($id)
	{
		$sql = 'SELECT MultimediaID, HoldingsID, FileName, FileLocation, Permission, FileType FROM tblmultimedia WHERE HoldingsID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function load_locations()
	{
		$sql = 'SELECT LocationID, Location FROM tbllocation';
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function create_analytics($record)
	{
		$result = $this->db->insert('tblanalytics', $record);

		$status = ($result) ? 'success': 'error';

		$message = ($result)
		? "Record saved successfully."
		: 'Unable to save data.';

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_author($record)
	{
		$result = $this->db->insert('tblauthors', $record);

		$status = ($result) ? 'success': 'error';

		$message = ($result)
		? "Record saved successfully."
		: 'Unable to save data.';

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_subject($record)
	{
		$result = $this->db->insert('tblsubjects', $record);

		$status = ($result) ? 'success': 'error';

		$message = ($result)
		? "Record saved successfully."
		: 'Unable to save data.';

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_multimedia($record)
	{
		$result = $this->db->insert('tblmultimedia', $record);

		if($result)
		{
			$status = "success";

			$log_record = array
			(
				'ID' => strstr($record['FileName'] . "*1", '*', true),
				'Username' => $this->Accounts_model->get_session_data('UserName'),
				'Module' => 'Holdings',
				'ModuleFeature' => "Analytics Attachment",
				'Transaction' => ltrim(strstr($record['FileName'] . "*1", '*'),'*'),
				'IP' => $this->input->ip_address()
			);
			$this->create_log($log_record);
		}
		else
			$status = "error";

		$message = ($result)
		? "File is successfully uploaded"
		: "Unable to upload file.";

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_location($record)
	{
		$result = $this->db->insert('tbllocation', $record);

		$status = ($result) ? 'success': 'error';

		$message = ($result)
		? "Record saved successfully."
		: 'Unable to save data.';

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_analytics($updated_record)
	{
		$result = $this->db->where("AnalyticsID", $updated_record['AnalyticsID'])
		->update("tblanalytics", $updated_record); 

		$status = ($result) ? 'success': 'error';
		$message = ($result)
		? "Data has been successfully updated."
		: 'Unable to update data.';

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_author($updated_record)
	{
		$result = $this->db->where("AuthorID", $updated_record['AuthorID'])
		->update("tblauthors", $updated_record); 

		$status = ($result) ? 'success': 'error';
		$message = ($result)
		? "Data has been successfully updated."
		: 'Unable to update data.';

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_subject($updated_record)
	{
		$result = $this->db->where("SubjectID", $updated_record['SubjectID'])
		->update("tblsubjects", $updated_record); 

		$status = ($result) ? 'success': 'error';
		$message = ($result)
		? "Data has been successfully updated."
		: 'Unable to update data.';

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_permission($multimedia_id, $Permission)
	{	
		$this->db->set("Permission", $Permission);
		$this->db->where("MultimediaID", $multimedia_id); 
		$this->db->update("tblmultimedia");
	}

	public function update_location($updated_record)
	{
		$result = $this->db->where("LocationID", $updated_record['LocationID'])
		->update("tbllocation", $updated_record); 

		$status = ($result) ? 'success': 'error';
		$message = ($result)
		? "Data has been successfully updated."
		: 'Unable to update data.';

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function get_analytic($id)
	{
		$sql = 'SELECT a.AnalyticsID, b.HoldingsID, b.Volume, b.IssueNumber, a.CatalogSource, a.LanguageID, a.BroadClassID,

			CASE WHEN a.CallNumber LIKE "%$a%" THEN (CASE 
		    WHEN a.CallNumber LIKE "%$b%" 
		    OR a.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.CallNumber,"$a",-1)),"$",1)
		    ELSE SUBSTRING_INDEX(a.CallNumber,"$a",-1) END) ELSE "" END AS ClassNum,
		    
		    CASE WHEN a.CallNumber LIKE "%$b%" THEN (CASE 
		    WHEN a.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.CallNumber,"$b",-1)),"$",1) 
		    ELSE SUBSTRING_INDEX(a.CallNumber,"$b",-1) END) ELSE "" END as AuthorNum,
		    
		    CASE WHEN a.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.CallNumber,"$c",-1) ELSE "" END as PubDate,

		    CASE WHEN a.Title LIKE "%$a%" THEN (CASE 
		    WHEN a.Title LIKE "%$b%" 
		    OR a.Title LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.Title,"$a",-1)),"$",1)
		    ELSE SUBSTRING_INDEX(a.Title,"$a",-1) END) ELSE "" END AS Title,
		    
		    CASE WHEN a.Title LIKE "%$b%" THEN (CASE 
		    WHEN a.Title LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.Title,"$b",-1)),"$",1) 
		    ELSE SUBSTRING_INDEX(a.Title,"$b",-1) END) ELSE "" END as RmndrTitle,
		    
		    CASE WHEN a.Title LIKE "%$c%" THEN SUBSTRING_INDEX(a.Title,"$c",-1) ELSE "" END as StmntRspnsblty,

			CASE WHEN a.PhysicalDescription LIKE "%$a%" THEN (CASE 
		    WHEN a.PhysicalDescription LIKE "%$b%" 
		    OR a.PhysicalDescription LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.PhysicalDescription,"$a",-1)),"$",1)
		    ELSE SUBSTRING_INDEX(a.PhysicalDescription,"$a",-1) END) ELSE "" END AS Extent,
		    
		    CASE WHEN a.PhysicalDescription LIKE "%$b%" THEN (CASE 
		    WHEN a.PhysicalDescription LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.PhysicalDescription,"$b",-1)),"$c",1) 
		    ELSE SUBSTRING_INDEX(a.PhysicalDescription,"$b",-1) END) ELSE "" END AS OtherPhysical,
		    
		    -- CASE WHEN a.PhysicalDescription LIKE "%$c%" THEN SUBSTRING_INDEX(a.PhysicalDescription,"$c",-1) ELSE "" END AS Dimensions,
		    
		    a.MediaTypeID, a.MediaTypeSource, a.Location FROM tblanalytics a LEFT JOIN tblholdingscopy b ON b.HoldingsID = a.HoldingsID AND b.HoldingsCopyID = a.HoldingsCopyID WHERE a.AnalyticsID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_author($id, $type)
	{
		$sql = 'CALL sp_getauthoranalytics(?, ?);';
        $query = $this->db->query($sql, array($id, $type));
        return $query->result();
	}

	public function get_subject($id, $type)
	{
		$sql = 'CALL sp_getsubjectanalytics(?, ?);';
        $query = $this->db->query($sql, array($id, $type));
        return $query->result();
	}

	public function get_attachment($id)
	{
		$sql= 'SELECT HoldingsID, MultimediaID, FileName, FileType, FileLocation, Permission FROM tblmultimedia WHERE MultimediaID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_location($id)
	{
		$sql = 'SELECT LocationID, Location, MaterialTypeID FROM tbllocation WHERE LocationID = ?';
        $query = $this->db->query($sql, $id);
        return $query->result();
	}

	public function delete_record($id, $type)
	{
		if($type == "analytics")
			$result = $this->db->where("AnalyticsID", $id)->delete("tblanalytics");
		else if($type == "author") 
			$result = $this->db->where("AuthorID", $id)->delete("tblauthors");
		else if($type == "subject")
			$result = $this->db->where("SubjectID", $id)->delete("tblsubjects");
		else
			$result = $this->db->where("LocationID", $id)->delete("tbllocation");

		if($result)
		{
			$status = 'success';
			$message = 'You have successfully deleted this record.';
		}
		else
		{
			$status = 'error';
			$message = 'Unable to delete record.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function delete_attachment($id, $attachment)
	{
		// $this->db->where("MultimediaID", $id);
		// unlink($attachment);
		// $this->db->delete("tblmultimedia"); 

		unlink($attachment);
		$result = $this->db->where("MultimediaID", $id)
			->delete("tblmultimedia"); 
		
		if($result)
		{
			$status = 'success';
			$message = 'You have successfully deleted this attachment.';
		}
		else
		{
			$status = 'error';
			$message = 'Unable to delete attachment.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_log($log_record)
	{
		$this->db->select('Transaction');
		$this->db->from('tbltransactiontypes');
		$this->db->where('TransactionID', $log_record['Transaction']);
		$query = $this->db->get();
		$result = $query->row();

		$log_record['Transaction'] = (string)$result->Transaction;

		return $this->db->insert('tbllogs_backend', $log_record); 
	}

	function relax()
	{
		;
	}
}
?>