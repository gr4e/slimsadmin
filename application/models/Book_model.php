<?php
    class Book_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_book($username, $role)
        {
        	$sql = 'CALL sp_getbook(?, ?);';
            $query = $this->db->query($sql, array($username, $role));
            return $query->result();
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
    }