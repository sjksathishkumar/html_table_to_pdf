<?php
//============================================================+
// File name   : html_table_to_pdf.php
// Begin       : 28-04-2014
// Last Update : 29-04-2014
//
// Description : Used to print pdf from html table
//
// Author: Sathishkumar S
//
// (c) Copyright:
//               Sathishkumar S
//               http://sjksathishkumar.blogspot.com
//               sjksathishkumar@gmail.com
//============================================================+

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// mysql connection 
$con = mysql_connect("localhost","root"); 
  if(!$con) 
      { 
      die(mysql_error()); 
      } 
     
// get data from users table 
mysql_select_db("sathish"); 
$result = mysql_query("SELECT * FROM emp"); 

// create new PDF document
$pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
*/
// set default header data
//$pdf->SetHeaderData('', '', 'Bass Techs - Employee Data', 'www.basstechs.com');

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, "8");

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 8);

// add a page
$pdf->AddPage();

// create some HTML content

$html .= '<table border="1"  cellpadding="2">
			<thead>
				<tr bgcolor="#d2d2cd">
					<th width="50" align="center">EMP_ID</th>
					<th width="100" align="center">EMP_NAME</th>
					<th width="80" align="center">BANK_NAME</th>
					<th width="80" align="center">BRANCH</th>
					<th width="70" align="center">DATE_JOIN</th>
					<th width="145" align="center">DESIGNATION</th>
					<th width="60" align="center">DEPARTMENT</th>
					<th width="100" align="center">ASM</th>
					<th width="40" align="center">PF_NO</th>
					<th width="70" align="center">ESI_NO</th>
				</tr>
			</thead>';

// print the mysql content to table row

while($row = mysql_fetch_array($result)) 
  { 
    $emp_id = $row['emp_id']; 
    $emp_name = $row['emp_name']; 
    $branch = $row['branch']; 
    $dt_of_join = $row['dt_of_join']; 
    $bank_name = $row['bank_name'];
    $bank_acc_no = $row['bank_acc_no'];
	$designation = $row['designation'];
	$emp_dep = $row['emp_dep'];
	$asm = $row['asm'];
	$pf_no = $row['pf_no'];
	$esi_no = $row['esi_no'];
	$basic = $row['basic'];
	$utilty_allow = $row['utilty_allow'];
	$communication = $row['communication'];
	$mt_allow = $row['mt_allow'];
	$spl_allow = $row['spl_allow'];
	$house_rnt_allow = $row['house_rnt_allow'];
	$child_hstl_allow = $row['child_hstl_allow'];
	$project_allow = $row['project_allow'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$html .='<tr>
				<td width="50">'.$emp_id.'</td>
				<td width="100">'.$emp_name.'</td>
				<td width="80">'.$bank_name.'</td>
				<td width="80">'.$branch.'</td>
				<td width="70">'.$dt_of_join.'</td>
				<td width="145">'.$designation.'</td>
				<td width="60">'.$emp_dep.'</td>
				<td width="100">'.$asm.'</td>
				<td width="40">'.$pf_no.'</td>
				<td width="70">'.$esi_no.'</td>
			</tr>';
 }

$html .='</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// End of First Table
// ---------------------------------------------------------

//=================================================================
//==========Remaing coloums printing===============================

// set font
$pdf->SetFont('dejavusans', '', 8);

// add a page
$pdf->AddPage();

// create some HTML content
$html2 .= '<table border="1"  cellpadding="2">
			<thead>
				<tr bgcolor="#d2d2cd">
					<th width="50" align="center">EMP_ID</th>
					<th width="50" align="center">BASIC</th>
					<th width="80" align="center">UTILITY_ALLOW</th>
					<th width="80" align="center">COMMUNICATION</th>
					<th width="50" align="center">MT_ALLOW</th>
					<th width="60" align="center">SPL_ALLOW</th>
					<th width="100" align="center">HOUSE_RENT_ALLOW</th>
					<th width="100" align="center">CHILD_HSTL_ALLOW</th>
					<th width="80" align="center">PROJECT_ALLOW</th>
					<th width="80" align="center">MOBILE</th>
				</tr>
			</thead>';

//Reinitialise the $result

$result = mysql_query("SELECT * FROM emp"); 

// print the mysql content to table row

while($row = mysql_fetch_array($result)) 
  { 
    $emp_id = $row['emp_id']; 
    $emp_name = $row['emp_name']; 
    $branch = $row['branch']; 
    $dt_of_join = $row['dt_of_join']; 
    $bank_name = $row['bank_name'];
    $bank_acc_no = $row['bank_acc_no'];
	$designation = $row['designation'];
	$emp_dep = $row['emp_dep'];
	$asm = $row['asm'];
	$pf_no = $row['pf_no'];
	$esi_no = $row['esi_no'];
	$basic = $row['basic'];
	$utilty_allow = $row['utilty_allow'];
	$communication = $row['communication'];
	$mt_allow = $row['mt_allow'];
	$spl_allow = $row['spl_allow'];
	$house_rnt_allow = $row['house_rnt_allow'];
	$child_hstl_allow = $row['child_hstl_allow'];
	$project_allow = $row['project_allow'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$html2 .='<tr>
				<td width="50">'.$emp_id.'</td>
				<td width="50">'.$basic.'</td>
				<td width="80">'.$utilty_allow.'</td>
				<td width="80">'.$communication.'</td>
				<td width="50">'.$mt_allow.'</td>
				<td width="60">'.$spl_allow.'</td>
				<td width="100">'.$house_rnt_allow.'</td>
				<td width="100">'.$child_hstl_allow.'</td>
				<td width="80">'.$project_allow.'</td>
				<td width="80">'.$mobile.'</td>
			</tr>';
 }

$html2 .='</table>';

// output the HTML content

$pdf->writeHTML($html2, true, false, true, false, '');

// Print some HTML Cells

//$html = '<span color="red">red</span> <span color="green">green</span> <span color="blue">blue</span><br /><span color="red">red</span> <span color="green">green</span> <span color="blue">blue</span>';

//$pdf->SetFillColor(255,255,0);
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 1, true, 'C', true);
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'R', true);

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// ---------------------------------------------------------

// Clean the buffer

ob_end_clean();

//Close and output PDF document
$pdf->Output('report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
