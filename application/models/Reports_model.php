<?php

class Reports_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_acquisitions($material, $mode, $user, $from, $to)
	{
		$this->db->select('a.AcquisitionID, a.HoldingsID, 
		CASE WHEN a.Title = "" THEN " " ELSE CONCAT(a.Title,". ") END AS Title, 

		CASE WHEN GROUP_CONCAT(c.AuthorName) IS NULL THEN " " ELSE CONCAT(GROUP_CONCAT(c.AuthorName SEPARATOR "yyyyyyy"), ". ") END AS Author, 

		CASE WHEN a.CopyNumber = "" THEN " " ELSE CONCAT(a.CopyNumber,". ") END as CopyNumber, 
		b.MaterialTypeID, CONCAT(f.Source,". ") AS Source,
      
        CASE WHEN d.Publication LIKE "%$a%" THEN (CASE 
        WHEN d.Publication LIKE "%$b%" THEN CONCAT(SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$a",-1)),"$b",1),": ") 
        ELSE  CONCAT(SUBSTRING_INDEX(d.Publication,"$a",-1),": ")  END) ELSE " " END as PublicationPlace,

        CASE WHEN d.Publication LIKE "%$b%" THEN (CASE 
        WHEN d.Publication LIKE "%$c%" THEN CONCAT(SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$b",-1)),"$",1),". ")
        ELSE CONCAT(SUBSTRING_INDEX(d.Publication,"$b",-1),". ") END) ELSE "" END as Publisher,
      	
      	CASE WHEN d.PublicationYear = "" THEN " " ELSE CONCAT(d.PublicationYear, ". ") END AS PublicationYear,
      
      	CASE WHEN b.CallNumber LIKE "%$a%" THEN (CASE 
        WHEN b.CallNumber LIKE "%$b%" 
        OR b.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.CallNumber,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(b.CallNumber,"$a",-1) END) ELSE "" END AS ClassificationNum,

        CASE WHEN b.CallNumber LIKE "%$b%" THEN (CASE 
        WHEN b.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.CallNumber,"$b",-1)),"$",1) 
        ELSE SUBSTRING_INDEX(b.CallNumber,"$b",-1) END) ELSE "" END as AuthorNum,

        CASE WHEN b.CallNumber LIKE "%$c%" THEN CONCAT("(", SUBSTRING_INDEX(b.CallNumber,"$c",-1), "). ") ELSE " " END as CopyrightDate,

        e.Volume, e.IssueNumber');
        $this->db->from('tblacquisitions a');
        $this->db->join('tblholdings b', 'b.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('(SELECT HoldingsID, CASE 
		WHEN AuthorTag = 100 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%" 
            OR AuthorName LIKE "%$c%" 
            OR AuthorName LIKE "%$e%" 
            OR AuthorName LIKE "%$d%" 
            OR AuthorName LIKE "%$q%" 
            OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END ) 
        
        WHEN AuthorTag = 110 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%"
            OR AuthorName LIKE "%$c%"
            OR AuthorName LIKE "%$d%"
            OR AuthorName LIKE "%$n%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        WHEN AuthorTag = 700 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%" 
            OR AuthorName LIKE "%$c%" 
            OR AuthorName LIKE "%$e%" 
            OR AuthorName LIKE "%$d%" 
            OR AuthorName LIKE "%$q%" 
            OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        WHEN AuthorTag = 710 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%"
            OR AuthorName LIKE "%$c%"
            OR AuthorName LIKE "%$d%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        ELSE "" END AS AuthorName FROM tblauthors) c', 'c.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblpublications d', 'd.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblholdingscopy e', 'e.AcquisitionID = a.AcquisitionID', 'left');
        $this->db->join('tblsources f', 'f.SourceID = e.AcquisitionMode', 'left');
		$this->db->where('a.IsActive', 1);
		$this->db->where('b.MaterialTypeID', $material);
		$this->db->where_in('e.AcquisitionMode', $mode);
		$this->db->where_in('a.CreatedBy', $user);
		// $this->db->where('DATE_FORMAT(e.DateAcquired, "%m/%d/%Y") BETWEEN "'.$from.'" AND "'.$to.'"',NULL,FALSE);
        $this->db->where('e.DateAcquired BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
		$this->db->group_by('a.AcquisitionID');
		$this->db->order_by('b.CreatedAt', 'ASC');

		return $this->db->get()->result_array();	
	}

	public function get_materialtypes()
    {
        $query = $this->db->query('SELECT * FROM tblmaterials WHERE MaterialTypeID != 9 ORDER BY MaterialTypeID');
        return $query->result_array();
    }

    public function get_sources()
    {
        $query = $this->db->query('SELECT * FROM tblsources ORDER BY SourceID');
        return $query->result_array();
    }

    public function get_users()
    {
        $query = $this->db->query('SELECT * FROM tblusers ORDER BY UserID');
        return $query->result_array();
    }

    public function get_broadclass()
    {
        $query = $this->db->query('SELECT * FROM tblbroadclass ORDER BY BroadClassID');
        return $query->result_array();
    }

    public function get_locations()
    {
        $query = $this->db->query('SELECT * FROM tbllocation ORDER BY LocationID');
        return $query->result_array();
    }

    public function get_stitles()
    {
        $query = $this->db->query('SELECT DISTINCT SeriesStatement as Title FROM tblholdingscopy ORDER BY SeriesStatement ');
        return $query->result_array();
    }


    public function generate_inventory($generatedate, $from, $to, $user, $material, $sortby, $sortorder)
    {
        $this->db->distinct();
        $this->db->select('b.HoldingsID, CONCAT(CASE WHEN b.callnumber LIKE "%$a%" THEN (CASE WHEN b.callnumber LIKE "%$b%"OR b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(b.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN b.callnumber LIKE "%$b%" THEN (CASE WHEN b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(b.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(b.callnumber,"$c",-1) ELSE "" END) AS CallNumber,a.TemporaryLocation, CASE WHEN b.titlestatement LIKE "%$a%" THEN (CASE 
        WHEN b.titlestatement LIKE "%$b%"
        OR b.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.titlestatement,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(b.titlestatement,"$a",-1) END) ELSE "" END AS Title, c.Author, CASE WHEN b.Edition LIKE "%$a%" THEN (CASE 
        WHEN b.Edition LIKE "%$b%"
        OR b.Edition LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.Edition,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(b.Edition,"$a",-1) END) ELSE "" END AS Edition,  CASE WHEN d.Publication LIKE "%$a%" THEN (CASE 
        WHEN d.Publication LIKE "%$b%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$a",-1)),"$b",1) 
        ELSE SUBSTRING_INDEX(d.Publication,"$a",-1) END) ELSE "" END as PublicationPlace, d.PublicationYear as PublicationYear, a.CopyNumber as CopyNumber, e.BroadClass as BroadClass, a.AccessionNumber as AccessionNumber, f.Source as AcquisitionSource, a.DateAcquired as AcquisitionDate, b.HoldingsID as HoldingsID, a.CirculationNumber, DATE_FORMAT(g.InventoryDate, "%m/%d/%Y") as InventoryDate, g.Remarks as Remarks');
        $this->db->from('tblholdingscopy a');
        $this->db->join('tblholdings b', 'b.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblpublications d', 'd.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblbroadclass e', 'e.BroadClassID = b.BroadClass', 'left');
        $this->db->join('tblsources f', 'f.SourceID = a.AcquisitionMode', 'left');
        $this->db->join('tblinventory g', 'g.CirculationNumber = a.CirculationNumber ', 'left');
         $this->db->join('(SELECT aa.HoldingsID, GROUP_CONCAT(CASE WHEN aa.AuthorName LIKE "%$a%" THEN (CASE 
        WHEN aa.AuthorName LIKE "%$b%"
        OR aa.AuthorName LIKE "%$c%"
        OR aa.AuthorName LIKE "%$d%"
        OR aa.AuthorName LIKE "%$n%"
        OR aa.AuthorName LIKE "%$e%"
        OR aa.AuthorName LIKE "%$q%"
        OR aa.AuthorName LIKE "%$u%"THEN SUBSTRING_INDEX((SUBSTRING_INDEX(aa.AuthorName,"$a",-1 )) ,"$",1 ) 
        ELSE (SUBSTRING_INDEX((aa.AuthorName),"$a",-1)) END) ELSE "" END SEPARATOR"/") as Author FROM tblauthors aa left join tblholdingscopy bb on bb.HoldingsID=aa.HoldingsID GROUP by bb.AcquisitionID ) c', 'c.HoldingsID = a.HoldingsID', 'left');
        
        $this->db->where_in('a.CreatedBy', $user);
        $this->db->where_in('b.MaterialTypeID', $material);

        if($generatedate == 1)
            $this->db->where('g.InventoryDate BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        else
            $this->db->where('a.DateAcquired BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');

        // if($generatedate == 1)
        //     $this->db->where('DATE_FORMAT(g.InventoryDate, "%m/%d/%Y") BETWEEN "'.$from.'" AND "'.$to.'"',NULL,FALSE);
        // else
        //     $this->db->where('DATE_FORMAT(a.DateAcquired, "%m/%d/%Y") BETWEEN "'.$from.'" AND "'.$to.'"',NULL,FALSE);
        
        $this->db->order_by($sortby, $sortorder);
        return $this->db->get()->result();    
    }

    public function generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary)
    {
        if($summary == 1)
        {
            $sql = 'CALL sp_generatesummary(?, ?, ?);';
            $query = $this->db->query($sql, array($reportby, implode(".", $material), implode(".", $location)));
        }
        else if($summary == 2)
        {
            $sql = 'CALL sp_generateoverallsummary();';
            $query = $this->db->query($sql);
        }
        else if($summary >= 3)
        {
            $sql = 'CALL sp_summarybcma2(?, ?, ?, ?);';
            $query = $this->db->query($sql, array($summary, $generatedate, date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to))));
        }
        
        return $query->result();
    }

    public function generate_list_of_publication_title($series)
    {
        $sql ='SELECT DISTINCT CASE WHEN b.titlestatement LIKE "%$a%" THEN (CASE 
            WHEN b.titlestatement LIKE "%$b%"
            OR b.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.titlestatement,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(b.titlestatement,"$a",-1) END) ELSE "" END AS Title, CASE 
            WHEN b.titlestatement LIKE "%$b%" THEN
            (CASE WHEN b.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.titlestatement,"$b",-1)),"$",1)
            ELSE SUBSTRING_INDEX(b.titlestatement,"$b",-1) END) ELSE "" END AS "Remainder of Title" from tblholdings b left join tblholdingscopy a on a.HoldingsID = b.HoldingsID where a.SeriesStatement = ? GROUP BY Title';
        $query = $this->db->query($sql, $series);
        return $query->result();
    }

    public function generate_titles_per_broadclass ($broadclass, $from, $to)
    {
        $this->db->select('COUNT(a.TitleStatement) as Title, a.BroadClass , b.BroadClass as BroadClassName, c.PublicationYear');
        $this->db->from('tblholdings a');
        $this->db->join('tblbroadclass b', 'b.BroadClassID = a.BroadClass', 'left');
        $this->db->join('tblpublications c', 'c.HoldingsID = a.HoldingsID', 'left');
        $this->db->where('c.PublicationYear BETWEEN "'.$from.'" AND "'.$to.'"');
        $this->db->where_in('a.BroadClass', $broadclass);
        $this->db->group_by('a.BroadClass');
        return $this->db->get()->result_array();
    }

    public function generate_total_number_of_cats($status, $material)
    {
        $this->db->select('COUNT(a.TitleStatement) as Title,b.MaterialType as MaterialType, a.MaterialTypeID');
        $this->db->from('tblholdings a');
        $this->db->join('tblmaterials b', 'b.MaterialTypeID = a.MaterialTypeID', 'left');

        if($status = 2)
        {
            $this->db->join('tblholdingscopy c', 'c.HoldingsID = a.HoldingsID', 'left');
            $this->db->where('a.CatalogNumber  =', "");
        }
        else
        {
            $this->db->where('a.CatalogNumber  =', "");
        }

        $this->db->where_in('b.MaterialTypeID', $material);
        $this->db->group_by('b.MaterialTypeID');
        return $this->db->get()->result_array();    
    }


    public function get_material($material) 
    {
        $this->db->select('GROUP_CONCAT(MaterialType SEPARATOR ", ") MaterialType');
        $this->db->from('tblmaterials');
        $this->db->where_in('MaterialTypeID', $material);
        return $this->db->get()->row()->MaterialType;
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

    function GET_downloadsList($dateFrom, $dateTo){
        $query = $this->db->query("SELECT stat_dwnldcount.DLDate, stat_dwnldcount.HoldingsID,
            tblmaterials.MaterialType,

            CASE WHEN tblholdings.TitleStatement LIKE '%\$a%' THEN (CASE
            WHEN tblholdings.TitleStatement LIKE '%\$b%'
            OR tblholdings.TitleStatement LIKE '%\$c%' THEN SUBSTRING_INDEX((SUBSTRING_INDEX(tblholdings.TitleStatement,'\$a',-1)),'$',1)
            ELSE SUBSTRING_INDEX(tblholdings.TitleStatement,'\$a',-1) END) ELSE '' END AS Title,
            CASE WHEN  tblholdings.CallNumber LIKE '%\$a%' THEN (CASE
            WHEN  tblholdings.CallNumber LIKE '%\$b%'
            OR tblholdings.CallNumber LIKE '%\$c%' THEN SUBSTRING_INDEX((SUBSTRING_INDEX(tblholdings.CallNumber,'\$a',-1)),'$',1)
            ELSE SUBSTRING_INDEX(tblholdings.CallNumber,'\$a',-1) END) ELSE '' END AS ClassificationNumber,
            CASE WHEN tblholdings.CallNumber LIKE '%\$b%' THEN (CASE
            WHEN tblholdings.CallNumber LIKE '%\$c%' THEN SUBSTRING_INDEX((SUBSTRING_INDEX(tblholdings.CallNumber,'\$b',-1)),'$',1)
            ELSE SUBSTRING_INDEX(tblholdings.CallNumber,'\$b',-1) END) ELSE '' END as ItemNumber,

            CASE WHEN tblholdings.CallNumber LIKE '%\$c%' THEN SUBSTRING_INDEX(tblholdings.CallNumber,'\$c',-1) ELSE '' END as CopyrightDate

            FROM stat_dwnldcount
            LEFT JOIN tblholdings
            ON tblholdings.HoldingsID = stat_dwnldcount.HoldingsID
            LEFT JOIN tblmaterials
            ON tblholdings.MaterialTypeID = tblmaterials.MaterialTypeID
            WHERE stat_dwnldcount.DLDate BETWEEN '".$dateFrom."' AND '".$dateTo."'
            ");
            return $query->result();

    }
}
?>