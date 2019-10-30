<?php
class Accounts_model extends CI_Model
{
	public function __construct()
	{

		$this->load->database();
	}

	// public function get_usernames()
	// {
	// 	$sql = 'SELECT id, uname, pass_decrypt, (CASE WHEN level = "super" THEN 1 WHEN level = "admin" THEN 2 WHEN level = "user" THEN 3 ELSE "" END) AS level, 3 groupid, 45 agencycode, status, lastlogin, (CASE WHEN logincount IS NULL THEN 0 ELSE logincount END) AS logincount, 0 loginstatus, "superadmin" createdby, date_created, "" updatedby FROM tblusername_decrypt WHERE AgencyCode = "STII" AND level IN ("super", "admin", "user")';

	// 	$query = $this->db->query($sql);
	// 	return $query->result();
	// }

	public function get_notifs()
	{
		$query = $this->db->query('SELECT aalID, InquiredBy, Subject, DATE_FORMAT(DateofInquiry, "%m/%d/%Y") AS DateofInquiry FROM askalib');
		return $query->result_array();
	}

	public function get_roles_dropdown()
	{
		$role = $this->get_session_data('RoleID');
		$sql = 'SELECT * from tblroles WHERE RoleID != 4';

		if($role == 2)
		{
			$sql = 'SELECT * from tblroles WHERE RoleID NOT IN(1, 2, 4)';
		}

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_modules_dropdown()
	{
		$query = $this->db->query('SELECT * FROM tblmodules');
		return $query->result_array();
	}

	public function get_groups_dropdown()
	{
		$query = $this->db->query('SELECT * FROM tblgroups WHERE GroupID != 1');
		return $query->result_array();
	}

	public function get_consortia_dropdown()
	{
		$query = $this->db->query('SELECT * FROM tblconsortia');
		return $query->result_array();
	}

	public function get_users()
	{
		$role = $this->get_session_data('RoleID');
		$sql = 'SELECT a.UserID, a.Username, b.Role, c.ConsortiumCode, d.GroupName, a.Status, DATE_FORMAT(a.CreatedAt, "%m/%d/%Y %h:%i %p") AS CreatedAt FROM tblusers a LEFT JOIN tblroles b on b.RoleID = a.RoleID LEFT JOIN tblconsortia c ON a.Consortium = c.ConsortiumID LEFT JOIN tblgroups d ON a.GroupID = d.GroupID';

		if($role == 2)
		{
			$sql = 'SELECT a.UserID, a.Username, b.Role, c.ConsortiumCode, d.GroupName, a.Status, DATE_FORMAT(a.CreatedAt, "%m/%d/%Y %h:%i %p") AS CreatedAt FROM tblusers a LEFT JOIN tblroles b on b.RoleID = a.RoleID LEFT JOIN tblconsortia c ON a.Consortium = c.ConsortiumID LEFT JOIN tblgroups d ON a.GroupID = d.GroupID WHERE a.RoleID NOT IN (1, 2)';
		}

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_groups()
	{
		$sql = 'SELECT GroupID, GroupName, GroupType, DATE_FORMAT(ValidDate, "%m/%d/%Y") AS ValidDate, Status FROM tblgroups';

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_consortia()
	{
		$sql = 'SELECT * FROM tblconsortia';

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_modules()
	{
		$sql = 'SELECT * FROM tblmodules';

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_tlogs()
	{
		$data = array(
			'ID' => 'datatable'
		);

		$this->db->where("ID", "")
		->update("tbllogs_backend", $data);

		$sql = 'SELECT BackEndLogID, ID, Username, Module, ModuleFeature, Transaction, DATE_FORMAT(LogDate, "%m/%d/%Y %r") as LogDate, IP FROM tbllogs_backend ORDER BY BackEndLogID DESC';

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_ulogs()
	{
		$sql = 'SELECT a.LogID, a.Username, b.Role AS UserType, TIME_FORMAT(a.LoginTime, "%h:%i %p") AS LoginTime, TIME_FORMAT(a.LogoutTime, "%h:%i %p") AS LogoutTime, DATE_FORMAT(a.LogDate, "%m/%d/%Y") AS LogDate, a.IP FROM tbluser_logbook a LEFT JOIN tblroles b ON b.RoleID = a.UserType ORDER BY a.LogID';

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_datalibraries($type)
	{
		if($type == 1)
		{
			$sql = 'SELECT MaterialTypeID as ID, MaterialType as Description FROM tblmaterials';
		}
		else if($type == 2)
		{
			$sql = 'SELECT SourceID as ID, Source as Description FROM tblsources';
		}
		else if($type == 3)
		{
			$sql = 'SELECT BroadClassID as ID, BroadClass as Description FROM tblbroadclass';
		}
		else if($type == 4)
		{
			$sql = 'SELECT CarrierTypeID as ID, CarrierTypeCode as Code, CarrierTypeTerm as Description FROM tblcarriertype';
		}
		else if($type == 5)
		{
			$sql = 'SELECT ContentTypeID as ID, ContentTypeCode as Code, ContentTypeTerm as Description FROM tblcontenttype';
		}
		else if($type == 6)
		{
			$sql = 'SELECT MediaTypeID as ID, MediaTypeCode as Code, MediaTypeTerm as Description FROM tblmediatype';
		}
		else
		{
			$sql = 'SELECT BroadClassID as ID, BroadClass as Description FROM tblbroadclass WHERE 0';
		}

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function login($data)
	{
		$groupid_arr = array();
		$this->db->select('*, NOW() AS today')->from('tblusers');
		$this->db->join('tblgroups', 'tblusers.GroupID = tblgroups.GroupID');
		$this->db->where('UserName', $data['UserName']);
		$this->db->where('tblusers.Status', 'active');
		$result = $this->db->get()->row();
		if($result)
		{
			$groupid_arr = explode(",",$result->GroupID);

			$this->db->select('GROUP_CONCAT(GroupID) AS GroupID, GROUP_CONCAT(ModuleAssignment) AS ModuleAssignment')->from('tblgroups');
			$this->db->where_in('GroupID', $groupid_arr);
			$groupids = $this->db->get()->row();
		}

		// Check if user exists
		if(isset($result->Salt))
		{
			// Hash the input password
			$hashed_password = $this->hash($data['Password'], $result->Salt);

			// Check if the password is correct
			if ($result->Password == $hashed_password)
			{
				if($result->ValidDate > $result->today || $result->ValidDate == "")
				{
					// Set session data
					$this->set_session($result->UserID, 1);

					// Save activity
					// $this->log(array(
					//     'activity' => 'login'
					// ));

					$status = 'success';
					$message = 'You have successfully logged in.';
					$module = $groupids->ModuleAssignment;

					$this->log_login($result->UserID, $result->LoginCount, 1);
				}
				else if($result->LoginStatus == 1)
				{
					$status = 'error';
					$message = 'User is already logged in.';
					$module = 0;
				}
				else
				{
					// Set session data
					$this->set_session($result->UserID, 0);

					$status = 'success';
					$message = 'You have successfully logged in.';
					$module = 0;

					$this->log_login($result->UserID, $result->LoginCount, 1);
				}

			}
			else
			{
				$status = 'error';
				$message = 'Incorrect password.';
				$module = 0;
			}

			return array(
				'status'  => $status,
				'message' => $message,
				'role'    => $result->RoleID,
				'group'    => $groupids->GroupID,
				'consortium'    => $result->Consortium,
				'module'    => $module
			);
		}
		else
		{
			$status = 'error';
			$message = 'User does not exists.';

			return array(
				'status'  => $status,
				'message' => $message
			);
		}
	}

	public function create_user($record)
	{
		if($this->check_username($record['Username']) === FALSE)
		{
			$record['Salt'] = $this->generate_salt();
			$record['Password'] = $this->hash($record['Password'], $record['Salt']);

			$result = $this->db->insert('tblusers', $record);

			$status = ($result) ? 'success': 'error';

			$message = ($result)
			? "Account: (".$record['Username'].") has been successfully added."
			: 'Unable to update data.';

			if($result)
			{
				$sql = 'SELECT * from tblusers WHERE UserName = ?';
				$query = $this->db->query($sql, $record['Username']);
				$new_user = $query->result();
				$new_user_data = array(
					'LibrarianID' => $new_user[0]->UserID,
					'Image' => 'noimage.png'
				);
				$this->db->insert('tbllibrarian_profile', $new_user_data);
			}
		}
		else
		{
			$status = 'error';
			$message = 'Username already exists.';
		}

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_group($record)
	{
		if($this->check_groupname($record['GroupName'], null, 'create') === FALSE)
		{

			if($this->check_validdate($record['ValidDate']) === FALSE)
			{
				$result = $this->db->insert('tblgroups', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Group: (".$record['GroupName'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = "Valid Date can't be earlier than current date.";
			}

		}
		else
		{
			$status = 'error';
			$message = 'Group name already exists.';
		}

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_consortium($record)
	{
		if($this->check_consortiumid($record['Consortium_ID'], null, 'create') === FALSE)
		{
			$result = $this->db->insert('tblconsortia', $record);

			$status = ($result) ? 'success': 'error';

			$message = ($result)
			? "Consortium: (".$record['ConsortiumName'].") has been successfully added."
			: 'Unable to update data.';
		}
		else
		{
			$status = 'error';
			$message = 'Consortium ID already exists.';
		}

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_module($record)
	{
		if($this->check_modulename($record['Module'], null, 'create') === FALSE)
		{
			$result = $this->db->insert('tblmodules', $record);

			// $this->db->select('ModuleID');
			// $this->db->from('tblmodules');
			// $this->db->order_by('ModuleID', 'DESC');
			// $this->db->limit(1);
			// $query = $this->db->get();
			// $result2 = $query->row();
			// $moduleid = (int)$result2->ModuleID;

			// $data = array(
			// 	'ModuleAssignment' => $this->get_session_data('ModuleAssignment') . ',' .  $moduleid
			// );

			// $this->db->where("GroupID", "1")
			// ->update("tblgroups", $data);

			// $this->set_session("1", 1);

			$status = ($result) ? 'success': 'error';

			$message = ($result)
			? "Module: (".$record['Module'].") has been successfully added."
			: 'Unable to update data.';
		}
		else
		{
			$status = 'error';
			$message = 'Module Name already exists.';
		}

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function create_datalibrary($record, $type)
	{
		if($type == "1")
		{
			if($this->check_materialname($record['MaterialType'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblmaterials', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Material Type: (".$record['MaterialType'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Material Type already exists.';
			}
		}
		else if($type == "2")
		{
			if($this->check_sourcename($record['Source'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblsources', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Acquisition Mode: (".$record['Source'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Acquisition Mode already exists.';
			}
		}
		else if($type == "3")
		{
			if($this->check_broadclass($record['BroadClass'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblbroadclass', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Broad Class: (".$record['BroadClass'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Broad Class already exists.';
			}
		}
		else if($type == "4")
		{
			if($this->check_carriercode($record['CarrierTypeCode'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblcarriertype', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Carrier Type Code: (".$record['CarrierTypeCode'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Carrier Type Code already exists.';
			}
		}
		else if($type == "5")
		{
			if($this->check_contentcode($record['ContentTypeCode'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblcontenttype', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Content Type Code: (".$record['ContentTypeCode'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Content Type Code already exists.';
			}
		}
		else if($type == "6")
		{
			if($this->check_mediacode($record['MediaTypeCode'], null, 'create') === FALSE)
			{
				$result = $this->db->insert('tblmediatype', $record);

				$status = ($result) ? 'success': 'error';

				$message = ($result)
				? "Media Type Code: (".$record['MediaTypeCode'].") has been successfully added."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Media Type Code already exists.';
			}
		}

		return
		array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_user($updated_record, $refresh_session = FALSE)
	{
		// Change password if input password is not empty
		if ($updated_record['Password'] != '')
		{
			// Update password
			$this->change_password($updated_record);
		}

		// Remove password on array to avoid updating column with null or unhashed password
		unset($updated_record['Password']);
		unset($updated_record['ConfirmPass']);

		$result = $this->db->where("UserID", $updated_record['UserID'])
		->update("tblusers", $updated_record);

		$status = ($result) ? 'success': 'error';
		$message = ($result)
		? "Account: (".$updated_record['UserName'].") has been successfully updated."
		: 'Unable to update data.';

		if ($refresh_session == TRUE)
		{
			$this->set_session($updated_record['UserID'], 1);
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_group($updated_record)
	{
		if($this->check_groupname($updated_record['GroupName'], $updated_record['GroupID'], 'update') === FALSE)
		{
			if($this->check_validdate($updated_record['ValidDate']) === FALSE)
			{
				$result = $this->db->where("GroupID", $updated_record['GroupID'])
				->update("tblgroups", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Group: (".$updated_record['GroupName'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = "Valid Date can't be earlier than current date.";
			}
		}
		else
		{
			$status = 'error';
			$message = 'Group name already exists.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_consortium($updated_record)
	{
		if($this->check_consortiumid($updated_record['Consortium_ID'], $updated_record['ConsortiumID'], 'update') === FALSE)
		{
			$result = $this->db->where("ConsortiumID", $updated_record['ConsortiumID'])
			->update("tblconsortia", $updated_record);

			$status = ($result) ? 'success': 'error';
			$message = ($result)
			? "Consortium: (".$updated_record['ConsortiumName'].") has been successfully updated."
			: 'Unable to update data.';
		}
		else
		{
			$status = 'error';
			$message = 'Consortium ID already exists.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_module($updated_record)
	{
		if($this->check_modulename($updated_record['Module'], $updated_record['ModuleID'], 'update') === FALSE)
		{
			$result = $this->db->where("ModuleID", $updated_record['ModuleID'])
			->update("tblmodules", $updated_record);

			$status = ($result) ? 'success': 'error';
			$message = ($result)
			? "Module: (".$updated_record['Module'].") has been successfully updated."
			: 'Unable to update data.';
		}
		else
		{
			$status = 'error';
			$message = 'Module already exists.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_datalibrary($updated_record, $type)
	{
		if($type == "1")
		{
			if($this->check_materialname($updated_record['MaterialType'], $updated_record['MaterialTypeID'], 'update') === FALSE)
			{
				$result = $this->db->where("MaterialTypeID", $updated_record['MaterialTypeID'])
				->update("tblmaterials", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Material Type: (".$updated_record['MaterialType'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Material Type already exists.';
			}
		}
		else if($type == "2")
		{
			if($this->check_sourcename($updated_record['Source'], $updated_record['SourceID'], 'update') === FALSE)
			{
				$result = $this->db->where("SourceID", $updated_record['SourceID'])
				->update("tblsources", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Acquisition Mode: (".$updated_record['Source'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Acquisition Mode already exists.';
			}
		}
		else if($type == "3")
		{
			if($this->check_broadclass($updated_record['BroadClass'], $updated_record['BroadClassID'], 'update') === FALSE)
			{
				$result = $this->db->where("BroadClassID", $updated_record['BroadClassID'])
				->update("tblbroadclass", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Broad Class: (".$updated_record['BroadClass'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Broad Class already exists.';
			}
		}
		else if($type == "4")
		{
			if($this->check_carriercode($updated_record['CarrierTypeCode'], $updated_record['CarrierTypeID'], 'update') === FALSE)
			{
				$result = $this->db->where("CarrierTypeID", $updated_record['CarrierTypeID'])
				->update("tblcarriertype", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Carrier Type Code: (".$updated_record['CarrierTypeCode'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Carrier Type Code already exists.';
			}
		}
		else if($type == "5")
		{
			if($this->check_contentcode($updated_record['ContentTypeCode'], $updated_record['ContentTypeID'], 'update') === FALSE)
			{
				$result = $this->db->where("ContentTypeID", $updated_record['ContentTypeID'])
				->update("tblcontenttype", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Content Type Code: (".$updated_record['ContentTypeCode'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Content Type Code already exists.';
			}
		}
		else if($type == "6")
		{
			if($this->check_mediacode($updated_record['MediaTypeCode'], $updated_record['MediaTypeID'], 'update') === FALSE)
			{
				$result = $this->db->where("MediaTypeID", $updated_record['MediaTypeID'])
				->update("tblmediatype", $updated_record);

				$status = ($result) ? 'success': 'error';
				$message = ($result)
				? "Media Type Code: (".$updated_record['MediaTypeCode'].") has been successfully updated."
				: 'Unable to update data.';
			}
			else
			{
				$status = 'error';
				$message = 'Media Type Code already exists.';
			}
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function delete_user($id, $data)
	{
		$result = $this->db->where("UserID", $id)
		->update("tblusers", $data);

		if($result)
		{
			$status = 'success';
			$message = 'You have successfully deleted this account.';
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

	public function delete_group($id)
	{
		$this->db->select('GroupID');
		$this->db->like('GroupID', $id, 'both');
		$result0 = $this->db->get('tblusers')->row('GroupID');

		if($result0 == "")
		{
			$result = $this->db->where("GroupID", $id)
			->delete("tblgroups");

			if($result)
			{
				$status = 'success';
				$message = 'You have successfully deleted this group.';
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete record.';
			}
		}
		else
		{
			$status = 'error';
			$message = 'Unable to delete data. Group is used in another record.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function delete_consortium($id)
	{
		$result0 = $this->db->get_where('tblusers', array('Consortium' => $id))
		->row('Consortium');

		$this->db->select('Consortium');
		$this->db->like('Consortium', $id, 'both');
		$result1 = $this->db->get('tblgroups')->row('Consortium');

		if($result0 == "" && $result1 == "")
		{
			$result = $this->db->where('ConsortiumID', $id)->delete('tblconsortia');
			if($result)
			{
				$status = 'success';
				$message = 'You have successfully deleted this consortium.';
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data.';
			}
		}
		else
		{
			$status = 'error';
			$message = 'Unable to delete data. Consortium is used in another record.';
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function delete_module($id)
	{
		$this->db->select('ModuleAssignment');
		$this->db->like('ModuleAssignment', $id, 'both');
		$result0 = $this->db->get('tblgroups')->row('ModuleAssignment');

		if($result0 == "")
		{
			$result = $this->db->where('ModuleID', $id)->delete('tblmodules');

			if($result)
			{
				$status = 'success';
				$message = 'You have successfully deleted this module.';
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete record.';
			}
		}
		else
		{
			$status = 'error';
			$message = 'Unable to delete data. Module is used in another record.';
		}


		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function delete_datalibrary($id, $type)
	{
		if($type == "1")
		{
			$result0 = $this->db->get_where('tblholdings', array('MaterialTypeID' => $id))
			->row('MaterialTypeID');

			if($result0 == "")
			{
				$result = $this->db->where('MaterialTypeID', $id)->delete('tblmaterials');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Material Type is used in another record';
			}
		}
		else if($type == "2")
		{
			$result0 = $this->db->get_where('tblholdingscopy', array('AcquisitionMode' => $id))
			->row('AcquisitionMode');

			if($result0 == "")
			{
				$result = $this->db->where('SourceID', $id)->delete('tblsources');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Acquisition Mode is used in another record';
			}
		}
		else if($type == "3")
		{
			$result0 = $this->db->get_where('tblholdings', array('BroadClassID' => $id))
			->row('BroadClassID');

			if($result0 == "")
			{
				$result = $this->db->where('BroadClassID', $id)->delete('tblbroadclass');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Broad Class is used in another record';
			}
		}
		else if($type == "4")
		{
			$result0 = $this->db->get_where('tblholdings', array('CarrierTypeID' => $id))
			->row('CarrierTypeID');

			if($result0 == "")
			{
				$result = $this->db->where('CarrierTypeID', $id)->delete('tblcarriertype');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Carrier Type is used in another record';
			}
		}
		else if($type == "5")
		{
			$result0 = $this->db->get_where('tblholdings', array('ContentTypeID' => $id))
			->row('ContentTypeID');

			if($result0 == "")
			{
				$result = $this->db->where('ContentTypeID', $id)->delete('tblcontenttype');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Content Type is used in another record';
			}
		}
		else if($type == "6")
		{
			$result0 = $this->db->get_where('tblholdings', array('MediaTypeID' => $id))
			->row('MediaTypeID');

			if($result0 == "")
			{
				$result = $this->db->where('MediaTypeID', $id)->delete('tblmediatype');
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
			}
			else
			{
				$status = 'error';
				$message = 'Unable to delete data. Media Type is used in another record';
			}
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function update_profile($data)
	{
		$result = $this->db->where('LibrarianID', $data['LibrarianID'])
		->update('tbllibrarian_profile', $data);

		if($result)
		{
			$status = 'success';
			$message = 'You have successfully updated your profile.';
		}
		else
		{
			$status = 'error';
			$message = 'Unable to update data.';
		}

		$this->set_session($data['LibrarianID'], 1);

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function change_password($data)
	{
		if($data['Password'] != $data['ConfirmPass'])
		{
			$status = 'error';
			$message = 'Password does not match.';
		}
		else
		{
			$record = $this->Accounts_model->get_user($data['UserID']);
			$new_password = $this->hash($data['Password'], $record[0]->Salt);

			$result = $this->db->where('UserName', $data['UserName'])
			->update('tblusers', array('Password' => $new_password));

			if($result)
			{
				$status = 'success';
				$message = 'You have successfully updated your password';

				// $this->log(array(
				//     'activity' => 'change password'
				// ));
			}
			else
			{
				$status = 'error';
				$message = 'Unable to update data';
			}
		}

		return array(
			'status'  => $status,
			'message' => $message
		);
	}

	public function get_user($id)
	{
		$sql = 'SELECT * from tblusers a JOIN tbllibrarian_profile b ON b.LibrarianID = a.UserID WHERE a.UserID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_group($id)
	{
		$sql = 'SELECT GroupID, GroupName, GroupType, Status, DATE_FORMAT(ValidDate, "%m/%d/%Y") as ValidDate, ModuleAssignment, Consortium from tblgroups WHERE GroupID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_consortium($id)
	{
		$sql = 'SELECT * from tblconsortia WHERE ConsortiumID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_module($id)
	{
		$sql = 'SELECT * from tblmodules WHERE ModuleID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function get_datalibrary($id, $type)
	{
		if($type == "1")
		$sql = 'SELECT MaterialTypeID as ID, MaterialType as Description, "" as Code from tblmaterials WHERE MaterialTypeID = ?';
		else if($type == "2")
		$sql = 'SELECT SourceID as ID, Source as Description, "" as Code from tblsources WHERE SourceID = ?';
		else if($type == "3")
		$sql = 'SELECT BroadClassID as ID, BroadClass as Description, "" as Code from tblbroadclass WHERE BroadClassID = ?';
		else if($type == "4")
		$sql = 'SELECT CarrierTypeID as ID, CarrierTypeTerm as Description, CarrierTypeCode as Code from tblcarriertype WHERE CarrierTypeID = ?';
		else if($type == "5")
		$sql = 'SELECT ContentTypeID as ID, ContentTypeTerm as Description, ContentTypeCode as Code from tblcontenttype WHERE ContentTypeID = ?';
		else if($type == "6")
		$sql = 'SELECT MediaTypeID as ID, MediaTypeTerm as Description, MediaTypeCode as Code from tblmediatype WHERE MediaTypeID = ?';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}

	public function log_login($id, $count, $status)
	{
		if($status == 1)
		{
			$data = array(
				'LastLogin'  => date('Y-m-d H:i:s'),
				'LoginCount' => $count+1,
				'LoginStatus' => $status
			);

			$data2 = array(
				'Username' => $this->get_session_data('UserName'),
				'UserType' => $this->get_session_data('RoleID'),
				'LoginTime' => $this->get_session_data('LoginTime'),
				'LogDate' => date('Y-m-d'),
				'IP' => $this->input->ip_address()
			);

			$this->db->insert('tbluser_logbook', $data2);
		}
		else
		{
			$data = array(
				'LoginStatus' => $status
			);

			$data2 = array(
				'LogoutTime' => date('h:i:s'),
			);

			$this->db->select('LogID')->from('tbluser_logbook');
			$this->db->where('CONCAT(Username,LoginTime)', $this->get_session_data('UserName').''.$this->get_session_data('LoginTime'));
			$result = $this->db->get()->row();

			$this->db->where("LogID", $result->LogID);
			$this->db->update("tbluser_logbook", $data2);
		}

		$this->db->where("UserID", $id);
		$this->db->update("tblusers", $data);
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

	public function get_session()
	{

		return $this->session->userdata('logged_in');
	}

	public function get_session_data($data)
	{
		$session_data = $this->session->userdata('logged_in');
		return $session_data[$data];
	}

	public function set_session($user_id, $group)
	{
		$this->db->select('*')->from('tblusers');
		$this->db->join('tbllibrarian_profile', 'tblusers.UserID = tbllibrarian_profile.LibrarianID');
		$this->db->where('UserID', $user_id);
		$result = $this->db->get()->row();
		$groupid_arr = explode(",",$result->GroupID);

		$this->db->select('GROUP_CONCAT(GroupID) AS GroupID, GROUP_CONCAT(ModuleAssignment) AS ModuleAssignment')->from('tblgroups');
		$this->db->where_in('GroupID', $groupid_arr);
		$groupids = $this->db->get()->row();

		$group == 0 ? $module = 0 : $module = $groupids->ModuleAssignment;

		// Add session data
		$sess_data = array(
			'UserID'            => $result->UserID,
			'UserName'          => $result->UserName,
			'LibrarianName'     => $result->LibrarianName,
			'Position'          => $result->Position,
			'Email'             => $result->Email,
			'FaxNo'             => $result->FaxNo,
			'TelNo'             => $result->TelNo,
			'OfficeAddress'     => $result->OfficeAddress,
			'Image'             => $result->Image,
			'Salt'              => $result->Salt,
			'RoleID'            => $result->RoleID,
			'GroupID'           => $groupids->GroupID,
			'Consortium'        => $result->Consortium,
			'ModuleAssignment'  => $module,
			'LoginTime'			=> date('h:i:s')
		);
		//print_r($sess_data);
		$this->session->sess_expiration = '86200'; // expires in 1 day
		$this->session->set_userdata('logged_in', $sess_data);
	}

	public function logout()
	{
		$this->log_login($this->get_session_data('UserID'), 0, 0);

		$this->session->sess_destroy();
	}

	public function check_username($username)
	{
		$result = $this->db->get_where('tblusers', array('UserName' => $username))
		->row('UserName');
		return ($result) ? TRUE: FALSE;
	}

	public function check_groupname($groupname, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblgroups WHERE GroupName = ?';
			$query = $this->db->query($sql, $groupname);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblgroups WHERE GroupName = ? AND GroupID != ?';
			$query = $this->db->query($sql, array($groupname, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_consortiumid($consortiumid, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblconsortia WHERE Consortium_ID = ?';
			$query = $this->db->query($sql, $consortiumid);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblconsortia WHERE Consortium_ID = ? AND ConsortiumID != ?';
			$query = $this->db->query($sql, array($consortiumid, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_modulename($modulename, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblmodules WHERE Module = ?';
			$query = $this->db->query($sql, $modulename);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblmodules WHERE Module = ? AND ModuleID != ?';
			$query = $this->db->query($sql, array($modulename, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_materialname($materialname, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblmaterials WHERE MaterialType = ?';
			$query = $this->db->query($sql, $materialname);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblmaterials WHERE MaterialType = ? AND MaterialTypeID != ?';
			$query = $this->db->query($sql, array($materialname, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_sourcename($sourcename, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblsources WHERE Source = ?';
			$query = $this->db->query($sql, $sourcename);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblsources WHERE Source = ? AND SourceID != ?';
			$query = $this->db->query($sql, array($sourcename, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_broadclass($broadclass, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblbroadclass WHERE BroadClass = ?';
			$query = $this->db->query($sql, $broadclass);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblbroadclass WHERE BroadClass = ? AND BroadClassID != ?';
			$query = $this->db->query($sql, array($broadclass, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_carriercode($carriercode, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblcarriertype WHERE CarrierTypeCode = ?';
			$query = $this->db->query($sql, $carriercode);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblcarriertype WHERE CarrierTypeCode = ? AND CarrierTypeID != ?';
			$query = $this->db->query($sql, array($carriercode, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_contentcode($contentcode, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblcontenttype WHERE ContentTypeCode = ?';
			$query = $this->db->query($sql, $contentcode);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblcontenttype WHERE ContentTypeCode = ? AND ContentTypeID != ?';
			$query = $this->db->query($sql, array($contentcode, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_mediacode($mediacode, $id, $mode)
	{
		if($mode == 'create')
		{
			$sql = 'SELECT * FROM tblmediatype WHERE MediaTypeCode = ?';
			$query = $this->db->query($sql, $mediacode);
		}
		else if($mode == 'update')
		{
			$sql = 'SELECT * FROM tblmediatype WHERE MediaTypeCode = ? AND MediaTypeID != ?';
			$query = $this->db->query($sql, array($mediacode, $id));
		}

		$result = $query->row();
		return ($result) ? TRUE: FALSE;
	}

	public function check_validdate($validdate)
	{
		$this->db->select('date_format(NOW(), "%Y/%m/%d") AS today');
		$result = $this->db->get()->row();

		// echo $validdate . " " . $result->today;

		if($result->today > $validdate && $validdate != NULL)
		return TRUE;
		else
		return FALSE;
	}

	public function generate_salt()
	{
		$this->load->library('encryption');
		return bin2hex($this->encryption->create_key(32));
	}

	public function hash($password, $salt)
	{

		return hash('sha256', $password . $salt);
	}



	//PATRON LIST
	function GET_patronList(){
		$query = $this->db->query("SELECT UserID, Username, FullName FROM users");
		return $query->result();
	}

	//PATRON Details
	function GET_patronDetail($UserID){
		$query = $this->db->query("SELECT UserID, Username, recQuestion, recAnswer, FullName, Email, Birthdate, Location, UserCat, SecondOp, ThirdOp, contactNo, Sex, affiliation, imgPath, DateReg, lastLog_TimeIN, lastLog_TimeOUT, lastLog_IP, status FROM users
			WHERE UserID = '".$UserID."'");
			return $query->row();
		}

	function UPDATE_patronPasswordReset($UserID, $pass){
		$query = $this->db->query("UPDATE users SET Password = '".$pass."' WHERE UserID = '".$UserID."'");
		return;
	}


	}
	?>
