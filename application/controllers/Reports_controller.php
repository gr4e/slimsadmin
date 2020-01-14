<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Reports_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Reports_model");
	}

	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['materials'] = $this->Reports_model->get_materialtypes();
		$data['sources'] = $this->Reports_model->get_sources();
		$data['users'] = $this->Reports_model->get_users();

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

		$this->load->template('reports/acquireportfilter', $data, $page);
	}

	public function inventoryfilter()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['materials'] = $this->Reports_model->get_materialtypes();
		$data['sources'] = $this->Reports_model->get_sources();
		$data['users'] = $this->Reports_model->get_users();
		$data['locations'] = $this->Reports_model->get_locations();

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

		$this->load->template('reports/inventoryfilter', $data, $page);
	}

	public function inhousereports()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['materials'] = $this->Reports_model->get_materialtypes();
		$data['sources'] = $this->Reports_model->get_sources();
		$data['users'] = $this->Reports_model->get_users();
		$data['stitles'] = $this->Reports_model->get_stitles();
		$data['bcs'] = $this->Reports_model->get_broadclass();

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

		$this->load->template('reports/inhousereports', $data, $page);
	}

	public function generate_sheetjs()
	{
		$generatedate =$this->input->post('generatedate');
		$from =$this->input->post('txtFrom');
		$to =$this->input->post('txtTo');
		$user =$this->input->post('cboUser');
		$report =$this->input->post('cboReport');

		$material =$this->input->post('cboMaterial');

		$sortby =$this->input->post('cboSortBy');
		$sortorder =$this->input->post('cboSortOrder');

		$location =$this->input->post('cboLocation');
		$reportby =$this->input->post('cboReportBy');
		$summary =$this->input->post('cboSummary');

		$inventory_record = array
		(
			'generatedate'     	=> $generatedate,
			'from'  	=> $from,
			'to'  	 	=> $to,
			'user'        	=> $user,
			'material'       	=> $material,
			'sortby'    		 	=> $sortby,
			'sortorder'    => $sortorder,

			'report'  	 	=> $report,
			'location'        	=> $location,
			'reportby'       	=> $reportby,
			'summary'    		 	=> $summary
		);

		// print_r($inventory_record);

		if($report == 1)
		{
			$data = $this->Reports_model->generate_inventory($generatedate, $from, $to, $user, $material, $sortby, $sortorder);
		}
		else
		{
			$data = $this->Reports_model->generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);


		}


		$cols = array();

		$i = 0;
		foreach ( $data as $record ) {
		    foreach( $record as $column=>$value ) {
		    		$a=array("data"=> $column,"name"=> $column);
		        	array_push($cols, $a);
			    }
		    if (++$i == 1) break;
		}

		// if($report == 2 && $summary == 1)
  //       {
  //           $v = $cols[2];
		// 	unset($cols[2]);
		// 	array_push($cols, $v);

		// 	$cols2 = array();
		// 	$cols2 = array_values($cols);
  //       }



		$output = array
		(
			"data" => $data,
			"columns" => $cols,
			"rows" => count($data)
		);

		// print_r($data);
		echo json_encode($output);
	}

	public function generate_sheetjs2()
	{
		$report =$this->input->post('cboReport');
		$series =$this->input->post('cboSeriesTitle');
		$broadclass =$this->input->post('cboBroadClass');
		$from =$this->input->post('dpFromYear');
		$to =$this->input->post('dpToYear');
		$status =$this->input->post('cboStatus');
		$material =$this->input->post('cboMaterial');

		$inhouse_record = array
		(
			'report'     	=> $report,
			'series'  	=> $series,
			'broadclass'    		 	=> $broadclass,
			'to'  	 	=> $to,
			'from'        	=> $from,
			'status'       	=> $status,
			'material'    => $material,
		);

		if($report == 1)
			$data = $this->Reports_model->generate_list_of_publication_title($series);
		else if($report == 2)
			$data = $this->Reports_model->generate_titles_per_broadclass($broadclass, $from, $to);
		else
			$data = $this->Reports_model->generate_total_number_of_cats($status, $material);

		$cols = array();

		$i = 0;
		foreach ( $data as $record ) {
		    foreach( $record as $column=>$value ) {
		    		$a=array("data"=> $column,"name"=> $column);
		        	array_push($cols, $a);
			    }
		    if (++$i == 1) break;
		}

		$output = array
		(
			"data" => $data,
			"columns" => $cols,
			"rows" => count($data)
		);

		echo json_encode($output);
	}

	// public function generate_report()
	// {
	// 	$this->load->library('form_validation');

	// 	$generatedate =$this->input->post('generatedate');
	// 	$from =$this->input->post('txtFrom');
	// 	$to =$this->input->post('txtTo');
	// 	$user =$this->input->post('cboUser');
	// 	$report =$this->input->post('cboReport');

	// 	$material =$this->input->post('cboMaterial');

	// 	$sortby =$this->input->post('cboSortBy');
	// 	$sortorder =$this->input->post('cboSortOrder');

	// 	$location =$this->input->post('cboLocation');
	// 	$reportby =$this->input->post('cboReportBy');
	// 	$summary =$this->input->post('cboSummary');


	// 	if($report == "1")
	// 	{
	// 		$this->form_validation->set_rules('daterange', 'From and To Date', 'required');
	// 		$this->form_validation->set_rules('cboUser[]', 'Inventoried By', 'required');
	// 		$this->form_validation->set_rules('cboMaterial[]', 'Material Type', 'required');
	// 	}
	// 	else
	// 	{
	// 		if($summary == 1)
	// 		{
	// 			$this->form_validation->set_rules('cboLocation[]', 'Location', 'required');
	// 			$this->form_validation->set_rules('cboMaterial[]', 'Material Type', 'required');
	// 		}
	// 		else if($summary == 2)
	// 		{
	// 			$this->form_validation->set_rules('cboReportBy', 'Report By', 'required');
	// 		}
	// 		else if($summary == 3 || $summary == 4)
	// 		{
	// 			$this->form_validation->set_rules('daterange', 'From and To Date', 'required');
	// 		}
	// 	}

	// 	$inventory_record = array
	// 	(
	// 		'generatedate'     	=> $generatedate,
	// 		'from'  	=> $from,
	// 		'to'  	 	=> $to,
	// 		'user'        	=> $user,
	// 		'material'       	=> $material,
	// 		'sortby'    		 	=> $sortby,
	// 		'sortorder'    => $sortorder,

	// 		'report'  	 	=> $report,
	// 		'location'        	=> $location,
	// 		'reportby'       	=> $reportby,
	// 		'summary'    		 	=> $summary
	// 	);

	// 	// print_r($inventory_record);

	// 	if ($this->form_validation->run() == false) {
 //            $this->inventoryfilter();
 //        }
 //        else
 //        {
 //        	$this->session->set_flashdata('message', '');

 //        	if($report == 1)
	// 		{
	// 			$this->generate_inventory_report($generatedate, $from, $to, $user, $material, $sortby, $sortorder);
	// 		}
	// 		else
	// 		{
	// 			if($summary == 1)
	// 				$this->generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);
	// 			else if($summary == 2)
	// 				$this->generate_overallsummary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);
	// 			else if($summary >= 3)
	// 				$this->generate_summary_reportbrbc($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);
	// 		}

 //        	// redirect(base_url('holdings/reports'));

 //        }
	// }

	public function generate_inhouse()
	{
		$this->load->library('form_validation');

		$report =$this->input->post('cboReport');
		$series =$this->input->post('cboSeriesTitle');
		$broadclass =$this->input->post('cboBroadClass');
		$from =$this->input->post('dpFromYear');
		$to =$this->input->post('dpToYear');
		$status =$this->input->post('cboStatus');
		$material =$this->input->post('cboMaterial');

		if($report == 1)
		{
			$this->form_validation->set_rules('cboSeriesTitle', 'Series Title', 'required');
		}
		else if($report == 2)
		{
			$this->form_validation->set_rules('cboBroadClass[]', 'Broad Class', 'required');
			$this->form_validation->set_rules('dpFromYear', 'From Date', 'required');
			$this->form_validation->set_rules('dpToYear', 'To Date', 'required');
		}
		else
		{
			$this->form_validation->set_rules('cboMaterial[]', 'Material Type', 'required');
		}

		$inhouse_record = array
		(
			'report'     	=> $report,
			'series'  	=> $series,
			'broadclass'    		 	=> $broadclass,
			'to'  	 	=> $to,
			'from'        	=> $from,
			'status'       	=> $status,
			'material'    => $material,
		);

		// print_r($inhouse_record);

		if ($this->form_validation->run() == false) {
            $this->inhousereports();
            // redirect('holdings/inhousereports');
        }
        else
        {
        	$this->session->set_flashdata('message', '');

        	if($report == 1)
				$this->list_of_publication_title_per_series($series);
			else if($report == 2)
				$this->generate_titles_per_broadclass($broadclass, $from, $to);
			else
				$this->total_number_of_cataloged_cats($status, $material);

			redirect('holdings/inhousereports');
        }
	}

	// public function generate_inventory_report($generatedate, $from, $to, $user, $material, $sortby, $sortorder)
	// {
	// 	$data = $this->Reports_model->generate_inventory($generatedate, $from, $to, $user, $material, $sortby, $sortorder);

	// 	// echo json_encode($data);

	// 	$material = $this->Reports_model->get_material($material);
	// 	$filedate = date("m-d-Y");
	// 	// print_r($data);

	// 	$spreadsheet = new Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();
	// 	$sheet->setCellValue("A1",'STII LIBRARY INVENTORY OF '.$material);

	// 	// add style to the header
	// 	$styleArray = array(
	// 		'font' => array(
	// 			'bold' => true,
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),

	// 	);

	// 	$spreadsheet->getActiveSheet()->getStyle('A2:O2')->applyFromArray($styleArray);

	// 	// auto fit column to content
	// 	foreach(range('A','O') as $columnID)
	// 	{
	// 		// $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
	// 		// 		->setAutoSize(true);
	// 	}

	// 	// set the names of header cells
	// 	$spreadsheet->setActiveSheetIndex(0)
	// 	->setCellValue("A2",'Call Number')
	// 	->setCellValue("B2",'Title')
	// 	->setCellValue("C2",'Author')
	// 	->setCellValue("D2",'Edition')
	// 	->setCellValue("E2",'Publication Place')
	// 	->setCellValue("F2",'Publication Year')
	// 	->setCellValue("G2",'Copy Number')
	// 	->setCellValue("H2",'Broad Class')
	// 	->setCellValue("I2",'Accession Number')
	// 	->setCellValue("J2",'Acquisition Source')
	// 	->setCellValue("K2",'Acquisition Date')
	// 	->setCellValue("L2",'HoldingsID')
	// 	->setCellValue("M2",'Circulation Number')
	// 	->setCellValue("N2",'Date of Inventory')
	// 	->setCellValue("O2",'Remarks');

	// 	// Add some data
	// 	$x= 3;

	// 	foreach($data as $d)
	// 	{
	// 		$spreadsheet->setActiveSheetIndex(0)

	// 		->setCellValue("A$x",$d->callnumber)
	// 		->setCellValue("B$x",$d->Title)
	// 		->setCellValue("C$x",$d->Author)
	// 		->setCellValue("D$x",$d->Edition)
	// 		->setCellValue("E$x",$d->PublicationPlace)
	// 		->setCellValue("F$x",$d->PublicationYear)
	// 		->setCellValue("G$x",$d->CopyNumber)
	// 		->setCellValue("H$x",$d->BroadClass)
	// 		->setCellValue("I$x",$d->AccessionNumber)
	// 		->setCellValue("J$x",$d->AcquisitionSource)
	// 		->setCellValue("K$x",$d->AcquisitionDate)
	// 		->setCellValue("L$x",$d->HoldingsID)
	// 		->setCellValue("M$x",$d->CirculationNumber)
	// 		->setCellValue("N$x",$d->InventoryDate)
	// 		->setCellValue("O$x",$d->Remarks);

	// 		$spreadsheet->getActiveSheet()->getRowDimension("$x")->setRowHeight(40);
	// 		$x++;
	// 	}

	// 	$styleCells = array(
	// 		'font' => array(
	// 			'size' => 9,
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	$y= $x-3;

	// 	$spreadsheet->getActiveSheet()->mergeCells("A$x:O$x");
	// 	$spreadsheet->setActiveSheetIndex(0)
	// 	->setCellValue("A$x",'TOTAL NUMBER OF RECORDS:'.''."$y");
	// 	$spreadsheet->getActiveSheet()->getStyle("A3:O$x")->applyFromArray($styleCells);
	// 	$spreadsheet->getActiveSheet()->getStyle("A3:O$x")->getAlignment()->setWrapText(true);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(90);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(20);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(20);

	// 	$writer = new Xlsx($spreadsheet);
	// 	$writer->save('List of Publication .xlsx');
	// 	$material = str_replace(', ', '', $material);

	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment;filename="'.$material.'_Inventory"'.$filedate.'.xlsx"');

	// 	ob_end_clean();

	// 	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save('php://output');

	// 	exit;
	// }

	// public function generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary)
	// {
	// 	$data = $this->Reports_model->generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);

	// 	// print_r($data);

	// 	$cols = array();

	// 	$i = 0;
	// 	foreach ( $data as $record ) {
	// 	    foreach( $record as $column=>$value ) {
	// 	        	array_push($cols, $column);
	// 		    }
	// 	    if (++$i == 1) break;
	// 	}

	// 	$filedate = date('m-d-Y');

	// 	$spreadsheet = new Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();
	// 	$sheet->setCellValue('A1','STII Library Inventory');
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);

	// 	// add style to the header
	// 	$styleArray = array(
	// 		'font' => array(
	// 			'bold' => true,
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	$spreadsheet->getActiveSheet()->getStyle('A1:B4')->applyFromArray($styleArray);



	// 	$styleCells = array(
	// 		'font' => array(
	// 			'size' => 9,
	// 			'style' => 'Arial'
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	//8
	// 	$spreadsheet->getActiveSheet()->getStyle('A3:'.$this->getNameFromNumber(count($cols)).(count($data)+9))->applyFromArray($styleCells);
	// 	$spreadsheet->getActiveSheet()->getStyle('A1:'.$this->getNameFromNumber(count($cols)).(count($data)+9))->getAlignment()->setWrapText(true);

	// 	// auto fit column to content
	// 	foreach(range('2',count($cols)) as $columnID)
	// 	{
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setAutoSize(false);
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setWidth(15);
	// 	}


	// 	for($x = 0; $x < count($cols); $x++)
	// 	{
	// 		$y = $this->getNameFromNumber($x);

	// 		if($x == 0)
	// 		{
	// 			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 4, $cols[$x]);
	// 			$spreadsheet->getActiveSheet()->mergeCells($y.'4:'.$y.'8');
	// 		}
	// 		else
	// 		{
	// 			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 5, $cols[$x]);
	// 			$spreadsheet->getActiveSheet()->mergeCells($y.'5:'.$y.'8');
	// 		}
	// 	}

	// 	$spreadsheet->getActiveSheet()->mergeCells('B4:'.$this->getNameFromNumber(count($cols)-2).'4');
	// 	$sheet->setCellValue('B4','Year Publication/Copyright Year');

	// 	// Add some data
	// 	$x= 9;
	// 	foreach($data as $d)
	// 	{
	// 		$i= 0;
	// 		foreach($cols as $key => $value)
	// 		{
	// 	      	$spreadsheet->setActiveSheetIndex(0)->setCellValue($this->getNameFromNumber($i)."$x",$d->$value);
	// 	      	$i++;
	// 	    }

	// 		$x++;
	// 	}

	// 	$writer = new Xlsx($spreadsheet);
	// 	$writer->save('summary.xlsx');
	// 	$material = str_replace(', ', '', $material);

	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment;filename="summary"'.$filedate.'.xlsx"');

	// 	ob_end_clean();

	// 	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save('php://output');

	// 	exit;
	// }

	// public function generate_overallsummary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary)
	// {
	// 	$data = $this->Reports_model->generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);

	// 	$filedate = date('m-d-Y');

	// 	$cols = array();

	// 	$i = 0;
	// 	foreach ( $data as $record ) {
	// 	    foreach( $record as $column=>$value ) {
	// 	        	array_push($cols, $column);
	// 		    }
	// 	    if (++$i == 1) break;
	// 	}

	// 	$spreadsheet = new Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();
	// 	$sheet->setCellValue('A1','STII Library Inventory');
	// 	$sheet->setCellValue('A2','Over all Summary of STII Libary Collections');
	// 	$sheet->setCellValue('A3','Per Copyright Year/Publication Year');
	// 	$sheet->setCellValue('A4','as of '.date("F j\, Y"));
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(90);

	// 	$styleArray = array(
	// 		'font' => array(
	// 			'bold' => true,
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	$spreadsheet->getActiveSheet()->getStyle('A1:B4')->applyFromArray($styleArray);

	// 	$styleCells = array(
	// 		'font' => array(
	// 			'size' => 9,
	// 			'name' => 'Arial'
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	$spreadsheet->getActiveSheet()->getStyle('A1:'.$this->getNameFromNumber(count($cols)).(count($data)+9))->getAlignment()->setWrapText(true);

	// 	$spreadsheet->getActiveSheet()->getStyle('A6:C'.(count($data)+9))->applyFromArray($styleCells);

	// 	$spreadsheet->getActiveSheet()->getStyle('A6:C7')->getAlignment()->setHorizontal('center');
	// 	$spreadsheet->getActiveSheet()->getStyle('B6:C'.(count($data)+9))->getAlignment()->setHorizontal('center');
	// 	$spreadsheet->getActiveSheet()->getStyle('A'.(count($data)+8))->getAlignment()->setHorizontal('right');


	// 	foreach(range('2',count($cols)) as $columnID)
	// 	{
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setAutoSize(false);
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setWidth(15);
	// 	}

	// 	for($x = 0; $x < count($cols); $x++)
	// 	{
	// 		$y = $this->getNameFromNumber($x);

	// 		if($x == 0)
	// 		{
	// 			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 6, $cols[$x]);
	// 			$spreadsheet->getActiveSheet()->mergeCells($y.'6:'.$y.'7');
	// 		}
	// 		else
	// 		{
	// 			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 7, $cols[$x]);
	// 			$spreadsheet->getActiveSheet()->mergeCells($y.'7:'.$y.'7');
	// 		}
	// 	}

	// 	$spreadsheet->getActiveSheet()->mergeCells('B6:'.$this->getNameFromNumber(count($cols)-1).'6');
	// 	$spreadsheet->getActiveSheet()->mergeCells('B6:C6');
	// 	// $spreadsheet->getActiveSheet()->getStyle('B6')->getFont()->getColor()->setARGB('2551020')
	// 	$sheet->setCellValue('B6','Total');

	// 	$x=8;
	// 	foreach($data as $d)
	// 	{
	// 		$i= 0;
	// 		foreach($cols as $key => $value)
	// 		{
	// 	      	$spreadsheet->setActiveSheetIndex(0)->setCellValue($this->getNameFromNumber($i)."$x",$d->$value);
	// 	      	$i++;
	// 	    }

	// 		$x++;
	// 	}

	// 	$writer = new Xlsx($spreadsheet);
	// 	$writer->save('overallsummary.xlsx');

	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment;filename="overallsummary"'.$filedate.'.xlsx"');

	// 	ob_end_clean();

	// 	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save('php://output');

	// 	exit;
	// }

	// public function generate_summary_reportbrbc($generatedate, $from, $to, $user, $material, $location, $reportby, $summary)
	// {
	// 	$data = $this->Reports_model->generate_summary_report($generatedate, $from, $to, $user, $material, $location, $reportby, $summary);

	// 	$bc =  array();

	// 	// foreach($data as $row)
	// 	// {
	// 	// 	$sub_array = array();
	// 	// 	$sub_array['BroadClass'] = strtoupper($row->{'Broad Class'});
	// 	// 	$bc[] = $sub_array;
	// 	// }

	// 	$bcs = array_column($bc, 'BroadClass');

	// 	$cols = array();

	// 	$i = 0;
	// 	foreach ( $data as $record ) {
	// 	    foreach( $record as $column=>$value ) {
	// 	        	array_push($cols, $column);
	// 		    }
	// 	    if (++$i == 1) break;
	// 	}

	// 	$filedate = date('m-d-Y');

	// 	$spreadsheet = new Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();
	// 	if($summary == 3)
	// 		$sheet->setCellValue('A1','STII Library Breakdown Report by Broad Class');
	// 	else
	// 		$sheet->setCellValue('A1','STII Library Breakdown Report by Acquisition Mode');
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);

	// 	// add style to the header
	// 	$styleArray = array(
	// 		'font' => array(
	// 			'bold' => true,
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	$spreadsheet->getActiveSheet()->getStyle('A1:'.$this->getNameFromNumber(count($cols)).'4')->applyFromArray($styleArray);

	// 	$styleCells = array(
	// 		'font' => array(
	// 			'size' => 9,
	// 			'style' => 'Arial'
	// 		),
	// 		'alignment' => array(
	// 			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'borders' => array(
	// 			'allborders' => array(
	// 				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
	// 			),
	// 		),
	// 	);

	// 	//8
	// 	$spreadsheet->getActiveSheet()->getStyle('A3:'.$this->getNameFromNumber(count($cols)).(count($data)+9))->applyFromArray($styleCells);
	// 	$spreadsheet->getActiveSheet()->getStyle('A1:'.$this->getNameFromNumber(count($cols)).(count($data)+9))->getAlignment()->setWrapText(true);

	// 	// auto fit column to content
	// 	foreach(range('2',count($cols)) as $columnID)
	// 	{
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setAutoSize(false);
	// 		$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnID)->setWidth(20);
	// 	}


	// 	for($x = 0; $x < count($cols); $x++)
	// 	{
	// 		$y = $this->getNameFromNumber($x);

	// 		// if($x == 0)
	// 		// {
	// 		// 	$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 4, $cols[$x]);
	// 		// 	$spreadsheet->getActiveSheet()->mergeCells($y.'4:'.$y.'8');
	// 		// }
	// 		// else
	// 		// {
	// 			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1 + $x, 3, $cols[$x]);
	// 			$spreadsheet->getActiveSheet()->mergeCells($y.'3:'.$y.'4');
	// 		// }
	// 	}

	// 	// $spreadsheet->getActiveSheet()->mergeCells('B4:'.$this->getNameFromNumber(count($cols)-2).'4');
	// 	// $sheet->setCellValue('B4','Year Publication/Copyright Year');


	// 	// Add some data
	// 	$x=5;
	// 	foreach($data as $d)
	// 	{
	// 		$i= 0;
	// 		foreach($cols as $key => $value)
	// 		{
	// 	      	$spreadsheet->setActiveSheetIndex(0)->setCellValue($this->getNameFromNumber($i)."$x",$d->$value);
	// 	      	$i++;
	// 	    }

	// 	    // if(in_array($d->$value,array_unique($bcs)) )
	//      //  	{
	//      //  		$spreadsheet->getActiveSheet()->getStyle($this->getNameFromNumber($i)."$x".':'.$this->getNameFromNumber($i).count($cols))->getFill()
	// 		   //  ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
	// 		   //  ->getStartColor()->setARGB('FFFF0000');

	// 		   //  echo 'A'.$i.':'.$this->getNameFromNumber(count($cols)-1).(count($cols)-1);
	// 		   //  // echo $i.$d->$value;

	//      //  	}

	// 		$x++;
	// 	}

	// 	$writer = new Xlsx($spreadsheet);
	// 	$writer->save('summary.xlsx');
	// 	$material = str_replace(', ', '', $material);

	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	if($summary == 3)
	// 		header('Content-Disposition: attachment;filename="summarybroadclass"'.$filedate.'.xlsx"');
	// 	else
	// 		header('Content-Disposition: attachment;filename="summaryacquimode"'.$filedate.'.xlsx"');


	// 	ob_end_clean();

	// 	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save('php://output');

	// 	exit;
	// }

	public function list_of_publication_title_per_series($series)
	{
		$data = $this->Reports_model->generate_list_of_publication_title($series);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'List of Publication Titles per Series Title - ' . " $series")
		->setCellValue('A2', 'Title(245a)')
		->setCellValue('B2', 'Remainder of the Title(245b)');
		$spreadsheet->getActiveSheet()->mergeCells('A1:B1');

		$styleArray = [
			'font' => [
				'bold' => true,
				'size' => 12,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				],
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getDefaultColumnDimension("A1")->setWidth(100);

		$x=3;
		foreach ($data as $d)
		{
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue("A$x",$d->Title)
			->setCellValue("B$x",$d->RemainderoftheTitle);
			$spreadsheet->getActiveSheet()->getRowDimension("$x")->setRowHeight(30);
			$x++;
		}

		$styleCells = [
			'font' => [
				'size' => 9,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];

		$y= $x-3;

		$spreadsheet->setActiveSheetIndex(0)->setCellValue("A$x",'TOTAL NUMBER OF RECORDS:'.''."$y");
		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->applyFromArray($styleCells);
		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->getAlignment()->setWrapText(true);

		$writer = new Xlsx($spreadsheet);
		$writer->save('List of Publication .xlsx');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="List of Publication Title "'.$series.'.xlsx"');

		ob_end_clean();

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}

	public function generate_titles_per_broadclass($broadclass, $from, $to)
	{
		$data = $this->Reports_model->generate_titles_per_broadclass($broadclass, $from, $to);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Total number of Titles per Broad Classification'.' from '."$from".' to '."$to")
		// $spreadsheet->setActiveSheetIndex(0)->setCellValue("A$x",'TOTAL NUMBER OF RECORDS:'.''."$y");
		->setCellValue('A2', 'Broad Classification')
		->setCellValue('B2', 'Total Number of Titles');
		$spreadsheet->getActiveSheet()->mergeCells('A1:B1');

		$styleArray = [
			'font' => [
				'bold' => true,
				'size' => 12,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getDefaultColumnDimension("A1")->setWidth(50);

		$x=3;
		foreach ($data as $d)
		{
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue("A$x",$d['BroadClassName'])
			->setCellValue("B$x",$d['Title']);
			$spreadsheet->getActiveSheet()->getRowDimension("$x")->setRowHeight(20);
			$x++;
		}

		$styleCells = [
			'font' => [
				'size' => 12,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->applyFromArray($styleCells);
		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->getAlignment()->setWrapText(true);

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Total Number of Titles per BroadClassification.xlsx"');

		ob_end_clean();

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}

	public function total_number_of_cataloged_cats($status, $material)
	{
		$material1 = implode(",", $material);

		$status == 0 ? $label ="Uncatalog" : $label ="Cataloged";
		$data = $this->Reports_model->generate_total_number_of_cats($status, $material);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', $label)
		->setCellValue('A2', 'Material Type')
		->setCellValue('B2', 'Total number of Titles');
		$spreadsheet->getActiveSheet()->mergeCells('A1:B1');

		$styleArray = [
			'font' => [
				'bold' => true,
				'size' => 12,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				],
			],

		];
		$spreadsheet->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getDefaultColumnDimension("A1")->setWidth(50);

		$x=3;
		foreach ($data as $d)
		{
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue("A$x",$d['MaterialType'])
			->setCellValue("B$x",$d['Title']);
			$spreadsheet->getActiveSheet()->getRowDimension("$x")->setRowHeight(20);
			$x++;
		}

		$styleCells = [
			'font' => [
				'size' => 12,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];

		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->applyFromArray($styleCells);
		$spreadsheet->getActiveSheet()->getStyle("A3:B$x")->getAlignment()->setWrapText(true);

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Total Number of Cataloged / Uncataloged Titles per Material Type.xlsx"');

		ob_end_clean();

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}

	public function load_pdf()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$from = $this->session->userdata('from');
		$to = $this->session->userdata('to');
		$material = $this->session->userdata('material');
		$mode = $this->session->userdata('mode');
		$user = $this->session->userdata('user');

		$data['from'] = $this->session->userdata('from');
		$data['to'] = $this->session->userdata('to');
		$data['material'] = $this->session->userdata('material');
		$data['mode'] = $this->session->userdata('mode');
		$data['user'] = $this->session->userdata('user');

		$data['books'] = in_array(1, $material) ? $this->Reports_model->get_acquisitions(1, $mode, $user, $from, $to) : array();
		$data['serials'] = in_array(2, $material) ? $this->Reports_model->get_acquisitions(2, $mode, $user, $from, $to) : array();
		$data['theses'] = in_array(3, $material) ? $this->Reports_model->get_acquisitions(3, $mode, $user, $from, $to) : array();
		$data['nonprints'] = in_array(4, $material) ? $this->Reports_model->get_acquisitions(4, $mode, $user, $from, $to) : array();
		$data['verticals'] = in_array(5, $material) ? $this->Reports_model->get_acquisitions(5, $mode, $user, $from, $to) : array();
		$data['investigatories'] = in_array(6, $material) ? $this->Reports_model->get_acquisitions(6, $mode, $user, $from, $to) : array();
		$data['technicals'] = in_array(7, $material) ? $this->Reports_model->get_acquisitions(7, $mode, $user, $from, $to) : array();
		$data['reprints'] = in_array(8, $material) ? $this->Reports_model->get_acquisitions(8, $mode, $user, $from, $to) : array();

		$letters = array('a'=>'','b'=>'','c'=>'','d'=>'','e'=>'','f'=>'','g'=>'','h'=>'');
		$letter = 'A';
		$letters['a'] = count($data['books']) > 0 ? $letter++ . '.' : '';
		$letters['b'] = count($data['serials']) > 0 ? $letter++ . '.' : '';
		$letters['c'] = count($data['theses']) > 0 ? $letter++ . '.' : '';
		$letters['d'] = count($data['nonprints']) > 0 ? $letter++ . '.' : '';
		$letters['e'] = count($data['verticals']) > 0 ? $letter++ . '.' : '';
		$letters['f'] = count($data['investigatories']) > 0 ? $letter++ . '.' : '';
		$letters['g'] = count($data['technicals']) > 0 ? $letter++ . '.' : '';
		$letters['h'] = count($data['reprints']) > 0 ? $letter++ . '.' : '';

		$data['letter'] = $letters;

		$this->load->view('reports/acquisitionsreport', $data);

		// Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function load_acquisitions()
	{
		$data['acquisitions'] = $this->Reports_model->get_acquisitions();
		echo json_encode($data);
	}

	function getNameFromNumber($num)
	{
	    $numeric = $num % 26;
	    $letter = chr(65 + $numeric);
	    $num2 = intval($num / 26);
	    if ($num2 > 0)
	        return getNameFromNumber($num2 - 1) . $letter;
	    else
	        return $letter;
	}

	public function set_params()
	{
		$this->load->library('session');
		$this->session->set_userdata('material',$this->input->post('material'));
		$this->session->set_userdata('mode',$this->input->post('mode'));
		$this->session->set_userdata('user',$this->input->post('user'));
		$this->session->set_userdata('from',$this->input->post('from'));
		$this->session->set_userdata('to',$this->input->post('to'));
		echo json_encode(array("status" => TRUE));
	}

	function relax()
	{
		;
	}

	//REPORT GENERATION FOR DOWNLOAD STATISTICS
	function Downloads_reports($data = NULL){

		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

		$this->load->template('reports/downloads', $data, $page);

	}


	function generateDownloadsList(){

		$outputData = "";
		$dateRange = $this->input->post('daterange');

		$dateFrom = date('Y-m-d',strtotime(substr($dateRange, 0, 10)));
		$dateTo = date('Y-m-d',strtotime(substr($dateRange, 13, 10)));

		$DLListResult = $this->Reports_model->GET_downloadsList($dateFrom, $dateTo);

		for ($i=0; $i < count($DLListResult) ; $i++) {
			$outputData .= "<tr><td>".substr($DLListResult[$i]->DLDate,0, 10)."</td>
			<td>".$DLListResult[$i]->Title."</td>
			<td>".$DLListResult[$i]->MaterialType."</td>
			<td>".$DLListResult[$i]->ClassificationNumber.$DLListResult[$i]->ItemNumber.$DLListResult[$i]->CopyrightDate."</td></tr>";
		}

		$data['DLlist'] = $outputData;

		$this->Downloads_reports($data);

	}
}
