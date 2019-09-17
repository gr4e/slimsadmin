<?php
class Acquisition_model extends CI_Model
{
    public function __construct()
    {

        $this->load->database();
    }

    public function get_source()
    {
        $query = $this->db->query('SELECT * FROM tblsources ORDER BY SourceID');
        return $query->result_array();
    }

    public function get_type()
    {
        $query = $this->db->query('SELECT * FROM tblmaterials WHERE MaterialTypeID != 9 ORDER BY MaterialTypeID');
        return $query->result_array();
    }

    public function get_month()
    {
        $query = $this->db->query('SELECT * FROM tblmonths ORDER BY MonthID');
        return $query->result_array();
    }

    public function get_acquisitions($type)
    {
        $role = $this->Accounts_model->get_session_data('RoleID');
        $user = $this->Accounts_model->get_session_data('UserName');
    	$sql = 'CALL sp_getacquisitions(?, ?, ?);';
        $query = $this->db->query($sql, array($type, $role, $user));
        return $query->result();
    }

    public function create_holdings($record)
    {

        return $this->db->insert('tblholdings', $record); 
    }

    public function create_holdingscopy($record)
    {
    	if($this->check_accession($record['AccessionNumber'], null, 'create') === TRUE && $this->check_circulation($record['CirculationNumber'], null, 'create') === TRUE)
		{
			$status = 'error';
			$message = 'Accession Number and Circulation Number already exists.';
		}
		else if($this->check_accession($record['AccessionNumber'], null, 'create') === TRUE)
		{
			$status = 'error';
			$message = 'Accession Number already exists.';
		}
		else if($this->check_circulation($record['CirculationNumber'], null, 'create') === TRUE)
		{
			$status = 'error';
			$message = 'Circulation Number already exists.';
		}
		else
		{
			$result = $this->db->insert('tblholdingscopy', $record);

			$status = ($result) ? 'success': 'error';

			$message = ($result)
			? "Record saved successfully."
			: 'Unable to save record.';
		}

        return
		array(
			'status'  => $status,
			'message' => $message
		);
    }

    public function create_acquisition($record)
    {
    	return $this->db->insert('tblacquisitions', $record); 
    }

    public function create_author($record)
    {

        return $this->db->insert('tblauthors', $record); 
    }

    public function create_publisher($record)
    {

        return $this->db->insert('tblpublications', $record); 
    }

    public function load_single_record($id)
    {
        $sql = 'CALL sp_getacquisition(?);';
        $query = $this->db->query($sql, $id);
        return $query->result();
	}

    public function update_holdings($holdings_id, $updated_record)
    {
        $this->db->where("HoldingsID", $holdings_id);  
        $this->db->update("tblholdings", $updated_record); 
    }

    public function update_holdingscopy($acquisition_id, $holdings_id, $updated_record)
    {
        if($this->check_accession($updated_record['AccessionNumber'], $acquisition_id, 'update') === TRUE && $this->check_circulation($updated_record['CirculationNumber'], $acquisition_id, 'update') === TRUE)
        {
            $status = 'error';
            $message = 'Accession Number and Circulation Number already exists.';
        }
        else if($this->check_accession($updated_record['AccessionNumber'], $acquisition_id, 'update') === TRUE)
        {
            $status = 'error';
            $message = 'Accession Number already exists.';
        }
        else if($this->check_circulation($updated_record['CirculationNumber'], $acquisition_id, 'update') === TRUE)
        {
            $status = 'error';
            $message = 'Circulation Number already exists.';
        }
        else
        {
            $this->db->where("AcquisitionID", $acquisition_id);  
            $result = $this->db->update("tblholdingscopy", $updated_record);

            $this->db->set('Title', $updated_record['Title']);
			$this->db->where('HoldingsID', $holdings_id); 
			$this->db->update('tblholdingscopy');  

            $status = ($result) ? 'success': 'error';

            $message = ($result)
            ? "Record saved successfully."
            : 'Unable to save record.';
        }

        return
        array(
            'status'  => $status,
            'message' => $message
        ); 
    }

    public function update_author($holdings_id, $author_record, $author_tag)
    {
        $this->db->where("HoldingsID", $holdings_id); 
        $this->db->where("AuthorTag", $author_tag);   
        $this->db->update("tblauthors", $author_record); 
    }

    public function update_publisher($holdings_id, $publisher_record)
    {
        $this->db->where("HoldingsID", $holdings_id);  
        $this->db->update("tblpublications", $publisher_record); 
    }

    public function update_acquisition($acquisition_id, $holdings_id, $acquisition_record)
    {
        $this->db->where("AcquisitionID", $acquisition_id);  
        $this->db->update("tblacquisitions", $acquisition_record); 

        $this->db->set('Title', $acquisition_record['Title']);
		$this->db->where('HoldingsID', $holdings_id);
		$this->db->update('tblacquisitions');
    }

    public function delete_acquisition($acquisition_id, $acquisition_record)
    {
        $this->db->where("AcquisitionID", $acquisition_id);  
        $this->db->update("tblacquisitions", $acquisition_record); 
    }

    public function delete_holdingscopy($acquisition_id, $acquisition_record)
    {
        $this->db->where("AcquisitionID", $acquisition_id);  
        $this->db->update("tblholdingscopy", $acquisition_record); 
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

    public function load_autocomplete_title($searchTerm)
    {
        $this->db->distinct();
        $this->db->select('CASE WHEN TitleStatement LIKE "%$a%" THEN (CASE 
        WHEN TitleStatement LIKE "%$b%" 
        OR TitleStatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(TitleStatement,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(TitleStatement,"$a",-1) END) ELSE "" END AS title');
        $this->db->like('TitleStatement', $searchTerm, 'both');
        return $this->db->get('tblholdings')->result();
    }

    public function load_autocomplete_personal($searchTerm)
    {
        $this->db->distinct();
        $this->db->select('CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%" 
        OR AuthorName LIKE "%$c%" 
        OR AuthorName LIKE "%$e%" 
        OR AuthorName LIKE "%$d%" 
        OR AuthorName LIKE "%$q%" 
        OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END AS author');
        $this->db->like('AuthorName', $searchTerm, 'both');
        $this->db->where('AuthorTag', "100");
        return $this->db->get('tblauthors')->result();
    }

    public function load_autocomplete_personal700($searchTerm)
    {
        $this->db->distinct();
        $this->db->select('CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%" 
        OR AuthorName LIKE "%$c%" 
        OR AuthorName LIKE "%$e%" 
        OR AuthorName LIKE "%$d%" 
        OR AuthorName LIKE "%$q%" 
        OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END AS author');
        $this->db->like('AuthorName', $searchTerm, 'both');
        $this->db->where('AuthorTag', "700");
        return $this->db->get('tblauthors')->result();
    }

    public function load_autocomplete_corporate($searchTerm)
    {
        $this->db->distinct();
        $this->db->select('CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%"
        OR AuthorName LIKE "%$c%"
        OR AuthorName LIKE "%$d%"
        OR AuthorName LIKE "%$n%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END AS author');
        $this->db->like('AuthorName', $searchTerm, 'both');
        $this->db->where('AuthorTag', "110");
        return $this->db->get('tblauthors')->result();
    }

    public function load_autocomplete_corporate710($searchTerm)
    {
        $this->db->distinct();
        $this->db->select('CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
        WHEN AuthorName LIKE "%$b%"
        OR AuthorName LIKE "%$c%"
        OR AuthorName LIKE "%$d%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END AS author');
        $this->db->like('AuthorName', $searchTerm, 'both');
        $this->db->where('AuthorTag', "710");
        return $this->db->get('tblauthors')->result();
    }

    public function generate_ids()
    {
        $sql = 'CALL sp_generateid();';

        $query = $this->db->query($sql);
        $result = $query->row();
        
        $query->next_result(); 
        $query->free_result(); 
        
        return $result;
    }

    public function update_ids($isNew)
    {
    	$sql = 'CALL sp_savegeneratedid(?);';

        $query = $this->db->query($sql, array($isNew));
        // $result = $query->row();
    }

    public function load_authordetails($author, $id)
    {
        $sql = 'CALL sp_getauthor(?, ?);';
        $query = $this->db->query($sql, array($author, $id));
        return $query->result();
    }

    public function load_autoloadfields($title, $author, $callnum)
    {
        $sql = 'CALL sp_getautoloadfields(?, ?, ?);';
        $query = $this->db->query($sql, array($title, $author, $callnum));
        return $query->result();
    }

    public function check_accession($accession, $id, $mode)
    {
        if($mode == 'create')
        {
            $sql = 'SELECT * FROM tblholdingscopy WHERE AccessionNumber = ? AND IsActive = 1'; 
            $query = $this->db->query($sql, $accession);
        }
        else if($mode == 'update')
        {
            $sql = 'SELECT * FROM tblholdingscopy WHERE AccessionNumber = ? AND AcquisitionID != ? AND IsActive = 1'; 
            $query = $this->db->query($sql, array($accession, $id));
        }
        
        $result = $query->row();
        return ($result) ? TRUE: FALSE;
    }

    public function check_circulation($circulation, $id, $mode)
    {
    	if($mode == 'create')
        {
            $sql = 'SELECT * FROM tblholdingscopy WHERE CirculationNumber = ? AND IsActive = 1'; 
            $query = $this->db->query($sql, $circulation);
        }
        else if($mode == 'update')
        {
            $sql = 'SELECT * FROM tblholdingscopy WHERE CirculationNumber = ? AND AcquisitionID != ? AND IsActive = 1'; 
            $query = $this->db->query($sql, array($circulation, $id));
        }
        
        $result = $query->row();
        return ($result) ? TRUE: FALSE;
    }

    // public function get_copynum($acquisition_id)
    // {
    //     $sql = 'SELECT CONVERT(SUBSTRING(sCopyNumber,2),UNSIGNED INTEGER) +1 AS sCopyNumber FROM holdings_copy WHERE AcquisitionID = ? ORDER BY AcquisitionID DESC LIMIT 1';
    //     $query = $this->db->query($sql, array($acquisition_id));
    //     $result = $query->row();
    
    //     return $result->sCopyNumber;
    // }

}