<?php
    class Monitoring_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_titles()
        {
            // $query = $this->db->query('SELECT NULL as Frequency, NULL as Title
            //     UNION 
            //     SELECT DISTINCT b.Frequency, 
            //      b.Title FROM tblholdings a LEFT JOIN tblholdingscopy b on b.HoldingsID = a.HoldingsID WHERE a.MaterialTypeID = 2 
            //     ORDER BY Title');

            $this->db->select('"---" as Frequency, "" as Title');
			$query1 = $this->db->get()->result_array();

			$this->db->distinct();
			$this->db->select('tblholdingscopy.Frequency, tblholdingscopy.Title');
			$this->db->from('tblholdings');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->order_by('tblholdingscopy.Title', 'ASC');
			$query2 = $this->db->get()->result_array();

			$result = array_merge($query1, $query2);
            return $result;
        }

        public function get_stitles()
        {
            $this->db->select('"---" as Frequency, "" as Title');
			$query1 = $this->db->get()->result_array();

			$this->db->distinct();
			$this->db->select('tblholdingscopy.Frequency, tblholdingscopy.SeriesStatement AS Title');
			$this->db->from('tblholdings');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->order_by('tblholdingscopy.Title', 'ASC');
			$query2 = $this->db->get()->result_array();

			$result = array_merge($query1, $query2);
            return $result;
        }

        public function get_acquimode($title, $stitle, $from_year, $to_year, $search)
        {
        	$this->db->select('tblholdingscopy.AcquisitionID, 
        		CASE 
        		WHEN tblholdingscopy.Frequency = "Daily" THEN CONCAT(tblmonths.Month, " ", tblacquisitions.Day, ", ", tblacquisitions.Year) 
        		WHEN tblholdingscopy.Frequency = "Weekly" THEN CONCAT("Week ", tblacquisitions.Week, " of ", tblmonths.Month, ", ", tblacquisitions.Year) 
        		WHEN tblholdingscopy.Frequency = "Monthly" THEN CONCAT( tblmonths.Month, ", ", tblacquisitions.Year) 
        		WHEN tblholdingscopy.Frequency = "Quarterly" THEN CONCAT("Quarter ", tblacquisitions.Quarter, " of ", tblacquisitions.Year) 
        		WHEN tblholdingscopy.Frequency = "Semiannually" THEN CONCAT("Half ", tblacquisitions.Semiannual, " of ", tblacquisitions.Year) 
        		WHEN tblholdingscopy.Frequency = "Yearly" THEN CONCAT("Year ", tblacquisitions.Year)
        		WHEN tblholdingscopy.Frequency = "Irregular" THEN (CASE WHEN tblmonths.Month != 0 THEN CONCAT(tblmonths.Month, ", ", tblacquisitions.Year) ELSE CONCAT("Year ", tblacquisitions.Year) END) ELSE "" END AS FreqDate, 

        		tblsources.Source, tblholdingscopy.IssueNumber, tblholdingscopy.Frequency, 

        		CASE 
				WHEN tblholdingscopy.Frequency = "Daily" THEN CONCAT(tblacquisitions.Year, "-",  tblacquisitions.Month, "-", tblacquisitions.Day) 
				WHEN tblholdingscopy.Frequency = "Weekly" THEN CONCAT(tblacquisitions.Year, "-", tblacquisitions.Week, "-", tblacquisitions.Month) 
				WHEN tblholdingscopy.Frequency = "Monthly" OR tblholdingscopy.Frequency = "Irregular" THEN CONCAT(tblacquisitions.Year, "-", tblacquisitions.Month) 
				WHEN tblholdingscopy.Frequency = "Quarterly" THEN CONCAT(tblacquisitions.Year, "-", tblacquisitions.Quarter) 
				WHEN tblholdingscopy.Frequency = "Semiannually" THEN CONCAT(tblacquisitions.Year, "-", tblacquisitions.Semiannual) 
				WHEN tblholdingscopy.Frequency = "Yearly" THEN tblacquisitions.Year ELSE "" END AS FreqDate2');
			$this->db->from('tblholdingscopy');
			$this->db->join('tblacquisitions', 'tblacquisitions.AcquisitionID = tblholdingscopy.AcquisitionID', 'left');
			$this->db->join('tblmonths', 'tblmonths.MonthID = tblacquisitions.Month', 'left');
			$this->db->join('tblsources', 'tblsources.SourceID = tblholdingscopy.AcquisitionMode', 'left');

			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblholdingscopy.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			return $this->db->get()->result();
        }

        public function get_daily($title, $stitle, $from_year, $to_year, $search)
        {
            $sql = 'CALL sp_generatedaily(?, ?, ?, ?, ?);';

            $query = $this->db->query($sql, array($title, $stitle, $from_year, $to_year, $search));

            return $query->result();
        }

        public function get_weekly($title, $stitle, $from_year, $to_year, $search)
        {
        	$this->db->select('tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, 
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 1 THEN "&#10004" ELSE "&#160" END) AS col3,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 1 THEN "&#10004" ELSE "&#160" END) AS col4,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 2 THEN "&#10004" ELSE "&#160" END) AS col5,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 2 THEN "&#10004" ELSE "&#160" END) AS col6,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 3 THEN "&#10004" ELSE "&#160" END) AS col7,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 3 THEN "&#10004" ELSE "&#160" END) AS col8,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 4 THEN "&#10004" ELSE "&#160" END) AS col9,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 4 THEN "&#10004" ELSE "&#160" END) AS col10,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 5 THEN "&#10004" ELSE "&#160" END) AS col11,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 5 THEN "&#10004" ELSE "&#160" END) AS col12,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 6 THEN "&#10004" ELSE "&#160" END) AS col13,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 6 THEN "&#10004" ELSE "&#160" END) AS col14,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 7 THEN "&#10004" ELSE "&#160" END) AS col15,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 7 THEN "&#10004" ELSE "&#160" END) AS col16,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 8 THEN "&#10004" ELSE "&#160" END) AS col17,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 8 THEN "&#10004" ELSE "&#160" END) AS col18,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 9 THEN "&#10004" ELSE "&#160" END) AS col19,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 9 THEN "&#10004" ELSE "&#160" END) AS col20,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 10 THEN "&#10004" ELSE "&#160" END) AS col21,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 10 THEN "&#10004" ELSE "&#160" END) AS col22,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 11 THEN "&#10004" ELSE "&#160" END) AS col23,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 11 THEN "&#10004" ELSE "&#160" END) AS col24,
            MIN(CASE WHEN tblacquisitions.Week  = 1 AND tblacquisitions.Month = 12 THEN "&#10004" ELSE "&#160" END) AS col25,
            MIN(CASE WHEN tblacquisitions.Week  = 2 AND tblacquisitions.Month = 12 THEN "&#10004" ELSE "&#160" END) AS col26');
            $this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Weekly');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array("col1", "col2")); 
			$query1 = $this->db->get()->result();

			$this->db->select('tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, 
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 1 THEN "&#10004" ELSE "&#160" END) AS col3,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 1 THEN "&#10004" ELSE "&#160" END) AS col4,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 2 THEN "&#10004" ELSE "&#160" END) AS col5,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 2 THEN "&#10004" ELSE "&#160" END) AS col6,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 3 THEN "&#10004" ELSE "&#160" END) AS col7,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 3 THEN "&#10004" ELSE "&#160" END) AS col8,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 4 THEN "&#10004" ELSE "&#160" END) AS col9,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 4 THEN "&#10004" ELSE "&#160" END) AS col10,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 5 THEN "&#10004" ELSE "&#160" END) AS col11,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 5 THEN "&#10004" ELSE "&#160" END) AS col12,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 6 THEN "&#10004" ELSE "&#160" END) AS col13,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 6 THEN "&#10004" ELSE "&#160" END) AS col14,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 7 THEN "&#10004" ELSE "&#160" END) AS col15,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 7 THEN "&#10004" ELSE "&#160" END) AS col16,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 8 THEN "&#10004" ELSE "&#160" END) AS col17,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 8 THEN "&#10004" ELSE "&#160" END) AS col18,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 9 THEN "&#10004" ELSE "&#160" END) AS col19,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 9 THEN "&#10004" ELSE "&#160" END) AS col20,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 10 THEN "&#10004" ELSE "&#160" END) AS col21,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 10 THEN "&#10004" ELSE "&#160" END) AS col22,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 11 THEN "&#10004" ELSE "&#160" END) AS col23,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 11 THEN "&#10004" ELSE "&#160" END) AS col24,
            MIN(CASE WHEN tblacquisitions.Week  = 3 AND tblacquisitions.Month = 12 THEN "&#10004" ELSE "&#160" END) AS col25,
            MIN(CASE WHEN tblacquisitions.Week  = 4 AND tblacquisitions.Month = 12 THEN "&#10004" ELSE "&#160" END) AS col26');
            $this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Weekly');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array('col1', 'col2')); 
			$query2 = $this->db->get()->result();

			$result = array_merge($query1, $query2);
            return $result;
        }

        public function get_monthly($title, $stitle, $from_year, $to_year, $search)
        {
        	$this->db->select('tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, MIN(CASE WHEN tblacquisitions.Month = 1 THEN "&#10004" ELSE "&#160" END) AS col3, MIN(CASE WHEN tblacquisitions.Month = 2 THEN "&#10004" ELSE "&#160" END) AS col4, MIN(CASE WHEN tblacquisitions.Month = 3 THEN "&#10004" ELSE "&#160" END) AS col5, MIN(CASE WHEN tblacquisitions.Month = 4 THEN "&#10004" ELSE "&#160" END) AS col6, MIN(CASE WHEN tblacquisitions.Month = 5 THEN "&#10004" ELSE "&#160" END) AS col7, MIN(CASE WHEN tblacquisitions.Month = 6 THEN "&#10004" ELSE "&#160" END) AS col8, MIN(CASE WHEN tblacquisitions.Month = 7 THEN "&#10004" ELSE "&#160" END) AS col9, MIN(CASE WHEN tblacquisitions.Month = 8 THEN "&#10004" ELSE "&#160" END) AS col10, MIN(CASE WHEN tblacquisitions.Month = 9 THEN "&#10004" ELSE "&#160" END) AS col11, MIN(CASE WHEN tblacquisitions.Month = 10 THEN "&#10004" ELSE "&#160" END) AS col12, MIN(CASE WHEN tblacquisitions.Month = 11 THEN "&#10004" ELSE "&#160" END) AS col13, MIN(CASE WHEN tblacquisitions.Month = 12 THEN "&#10004" ELSE "&#160" END) AS col14');
        	$this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Monthly');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array('col1', 'col2')); 
			$this->db->order_by('col1', 'ASC');
			return $this->db->get()->result();
        }

        public function get_quarterly($title, $stitle, $from_year, $to_year, $search)
        {
        	$this->db->select('tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, MIN(CASE WHEN tblacquisitions.Quarter = 1 THEN "&#10004" ELSE "&#160" END) AS col3, MIN(CASE WHEN tblacquisitions.Quarter = 2 THEN "&#10004" ELSE "&#160" END) AS col4, MIN(CASE WHEN tblacquisitions.Quarter = 3 THEN "&#10004" ELSE "&#160" END) AS col5, MIN(CASE WHEN tblacquisitions.Quarter = 4 THEN "&#10004" ELSE "&#160" END) AS col6');
        	$this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Quarterly');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array('col1', 'col2')); 
			$this->db->order_by('col1', 'ASC');
			return $this->db->get()->result();
        }

        public function get_Semiannually($title, $stitle, $from_year, $to_year, $search)
        {
			$this->db->select('tblacquisitions.AcquisitionID AS col0, tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, MIN(CASE WHEN tblacquisitions.Semiannual = 1 THEN "&#10004" ELSE "&#160" END) AS col3, MIN(CASE WHEN tblacquisitions.Semiannual = 2 THEN "&#10004" ELSE "&#160" END) AS col4');
        	$this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Semiannually');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array('col1', 'col2')); 
			$this->db->order_by('col1', 'ASC');
			return $this->db->get()->result();

			// $sql = 'CALL sp_try();';
			// $query = $this->db->query($sql);
			// return $query->result();
        }

        public function get_yearly($title, $stitle, $from_year, $to_year, $search)
        {
        	$this->db->select('tblacquisitions.Year AS col1, tblholdingscopy.Volume AS col2, MIN(CASE WHEN tblacquisitions.Year IS NOT NULL THEN "&#10004" ELSE "&#160" END) AS col3');
        	$this->db->from('tblacquisitions');
			$this->db->join('tblholdings', 'tblacquisitions.HoldingsID = tblholdings.HoldingsID', 'left');
			$this->db->join('tblholdingscopy', 'tblholdingscopy.AcquisitionID = tblacquisitions.AcquisitionID', 'left');
			$this->db->where('tblholdings.MaterialTypeID', 2);
			$this->db->where('tblholdingscopy.Frequency', 'Yearly');
			$this->db->where('tblacquisitions.Year >=', $from_year);
			$this->db->where('tblacquisitions.Year <=', $to_year);
			$this->db->where('tblacquisitions.IsActive', 1);
			$search == 1 ? $this->db->where('tblacquisitions.Title', $title) : $this->db->where('tblholdingscopy.SeriesStatement', $stitle);
			$this->db->group_by(array('col1', 'col2')); 
			$this->db->order_by('col1', 'ASC');
			return $this->db->get()->result();
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