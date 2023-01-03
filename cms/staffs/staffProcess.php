<?php

$operation = $_POST['operation'];


require './../plugins/phpMailer/PHPMailer.php';
require './../plugins/phpMailer/SMTP.php';
require './../plugins/phpMailer/Exception.php';

require "./../plugins/FPDF/fpdf.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

switch ($operation) {

  case 'fetchHEBTable':
    fetchHEBTable();
    break;

  case 'fetchSEHTable':
    fetchSEHTable();
    break;

  case 'fetchMSTable':
    fetchMSTable();
    break;

  case "staffStatistics":
    staffStatistics();
    break;

  case "addStaff":
    addStaff();
    break;

  case "getNewStaffID":
    getNewStaffID();
    break;

  case "viewStaff":
    viewStaff();
    break;

  case "checkMail":
    checkMail();
    break;

  case "sendCredentials";
    sendCredentials();
    break;

  case "printReport";
    printReport();
    break;

  case "deletePendingStaff";
    deletePendingStaff();
    break;

  case "viewStaffImage";
    viewStaffImage();
    break;
}

function paginate($currentPage, $totalPages){
  $pages = array();
  if($totalPages-$currentPage<0){
      for($i = 1; $i<=$totalPages ; $i++)
          array_push($pages, $i);
  }elseif($currentPage-2>0 && $currentPage+2<$totalPages){
      array_push($pages, 1,$currentPage-1,$currentPage,$currentPage+1,$currentPage+2, $totalPages);
  }elseif($currentPage-6<=0){
      for($i = 1 ; $i<=$totalPages ; $i++){
          if( count($pages) > 4){
              array_push($pages, $totalPages);
              break;
          }
          array_push($pages, $i);
      }
  }elseif($currentPage+6>=$totalPages){
      array_push($pages, 1);
      for($i = $totalPages ; $i>$totalPages-5 ; $i--)
          array_push($pages, $i);
  }
  sort($pages);
  return json_encode($pages);
}
function getTotalPages($entriesPerPage, $totalEntries){
  return ceil($totalEntries/$entriesPerPage);
}
function fetchHEBTable()
{
  require './../auth/dbConnect.php';
  

  $acadYear = $_POST['acadYear'];
  $HEBkeyword = $_POST['HEBkeyword'];
  $HEBpageNum = $_POST['HEBpageNum'];
  $HEBpageNum = ($HEBpageNum-1)*5;

  $arr = new StdClass();
  $arr->Entries = array();
  $arr->Pagination = array();
  // 5 entries per page 
  // page 1
  // page 1  = LIMIT 5 OFFSET (page-1)*5

  $query = "SELECT DISTINCT staffs.staffID, CONCAT(staffs.fName, ' ', staffs.lName) as name, staffs.username, editorialboard.acadYear, editorialboard.image, editorialboard.position, staffs.status FROM staffs LEFT OUTER JOIN editorialboard ON staffs.staffID = editorialboard.staffID WHERE editorialboard.role = 'Higher Editorial Board' AND editorialboard.acadYear = '$acadYear' AND (staffs.fname LIKE '%$HEBkeyword%' OR staffs.fname LIKE '%$HEBkeyword%' OR editorialboard.position = '%$HEBkeyword%') LIMIT 5 OFFSET $HEBpageNum; ";
  $totalPages = mysqli_num_rows(mysqli_query($dbConnect, "SELECT DISTINCT staffs.staffID, CONCAT(staffs.fName, ' ', staffs.lName) as name, staffs.username, editorialboard.acadYear, editorialboard.image, editorialboard.position, staffs.status FROM staffs LEFT OUTER JOIN editorialboard ON staffs.staffID = editorialboard.staffID WHERE editorialboard.role = 'Higher Editorial Board' AND editorialboard.acadYear = '$acadYear' AND (staffs.fname LIKE '%$HEBkeyword%' OR staffs.fname LIKE '%$HEBkeyword%' OR editorialboard.position = '%$HEBkeyword%') "));

  $number_filter_row = mysqli_num_rows(mysqli_query($dbConnect, $query));

  $result = mysqli_query($dbConnect, $query);

  while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();

    $sub_array[] = $row['image'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row["position"];
    $sub_array[] = $row["status"];
    $sub_array[] = $row['acadYear'];
    $sub_array[] = $row['staffID'];

    array_push($arr->Entries, $sub_array);
  }
  array_push($arr->Pagination, paginate($HEBpageNum, getTotalPages(5, $totalPages)));

  echo json_encode($arr);
}

function fetchSEHTable()
{
  require './../auth/dbConnect.php';

  $acadYear = $_POST['acadYear'];
  $SEHkeyword = $_POST['SEHkeyword'];

  $query = "SELECT DISTINCT staffs.staffID, CONCAT(staffs.fName, ' ', staffs.lName) as name, staffs.username, editorialboard.acadYear, editorialboard.image, editorialboard.position, staffs.status FROM staffs LEFT OUTER JOIN editorialboard ON staffs.staffID = editorialboard.staffID WHERE (editorialboard.role = 'Section Editor' OR editorialboard.role = 'Section Head') AND editorialboard.acadYear = '$acadYear' AND (staffs.fname LIKE '%$SEHkeyword%' OR staffs.fname LIKE '%$SEHkeyword%' OR editorialboard.position = '%$SEHkeyword%') ";

  $number_filter_row = mysqli_num_rows(mysqli_query($dbConnect, $query));

  $result = mysqli_query($dbConnect, $query);

  $data = array();

  while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();

    $sub_array[] = $row['image'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row["position"];
    $sub_array[] = $row["status"];
    $sub_array[] = $row['acadYear'];
    $sub_array[] = $row['staffID'];

    $data[] = $sub_array;
  }

  echo json_encode($data);
}

function fetchMSTable()
{
  require './../auth/dbConnect.php';

  $acadYear = $_POST['acadYear'];
  $MSkeyword = $_POST['MSkeyword'];

  $query = "SELECT DISTINCT staffs.staffID, CONCAT(staffs.fName, ' ', staffs.lName) as name, staffs.username, editorialboard.acadYear, editorialboard.image, editorialboard.position, staffs.status FROM staffs LEFT OUTER JOIN editorialboard ON staffs.staffID = editorialboard.staffID WHERE editorialboard.role = 'Members and Staff'  AND editorialboard.acadYear = '$acadYear' AND (staffs.fname LIKE '%$MSkeyword%' OR staffs.fname LIKE '%$MSkeyword%' OR editorialboard.position = '%$MSkeyword%') ";

  $number_filter_row = mysqli_num_rows(mysqli_query($dbConnect, $query));

  $result = mysqli_query($dbConnect, $query);

  $data = array();

  while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();

    $sub_array[] = $row['image'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row["position"];
    $sub_array[] = $row["status"];
    $sub_array[] = $row['acadYear'];
    $sub_array[] = $row['staffID'];

    $data[] = $sub_array;
  }

  echo json_encode($data);
}

function deletePendingStaff()
{
  require './../auth/dbConnect.php';
  $staffID = $_POST['staffID'];

  $deletePendingEbStaffQuery = "DELETE FROM editorialboard WHERE staffID = '$staffID';";
  $deletePendingStaffQuery = "DELETE FROM staffs WHERE staffID = '$staffID';";
  $executedeletePendingEbStaff = mysqli_query($dbConnect, $deletePendingEbStaffQuery);
  $executedeletePendingStaff = mysqli_query($dbConnect, $deletePendingStaffQuery);
}

function staffStatistics()
{
  require './../auth/dbConnect.php';

  // CURRENT EDITORIAL BOARD COUNT
  $query_ebCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(*) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active'");
  $execute_ebCurrentCount = mysqli_fetch_assoc($query_ebCurrentCount);
  $ebCurrentCount = $execute_ebCurrentCount['COUNT(*)'];

  // PAST EDITORIAL BOARD COUNT
  $query_ebPastCount = mysqli_query($dbConnect, "SELECT COUNT(*) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.acadYear = ( SELECT acadYear FROM ebyear ORDER BY acadYear DESC LIMIT 1, 1 );");
  $execute_ebPastCount = mysqli_fetch_assoc($query_ebPastCount);
  $ebPastCount = $execute_ebPastCount['COUNT(*)'];

  // CURRENT HIGHER EDITORIAL BOARD COUNT
  $query_hebCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Higher Editorial Board'");
  $execute_hebCurrentCount = mysqli_fetch_assoc($query_hebCurrentCount);
  $hebCurrentCount = $execute_hebCurrentCount['COUNT(DISTINCT(staffs.staffID))'];

  // CURRENT SECTION EDITOR AND SECTION HEAD COUNT
  $query_sehCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND (editorialboard.role = 'Section Head' or editorialboard.role = 'Section Editor');");
  $execute_sehCurrentCount = mysqli_fetch_assoc($query_sehCurrentCount);
  $sehCurrentCount = $execute_sehCurrentCount['COUNT(DISTINCT(staffs.staffID))'];

  // CURRENT MEMBERS AND STAFFS COUNT
  $query_msCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Members and Staff';");
  $execute_msCurrentCount = mysqli_fetch_assoc($query_msCurrentCount);
  $msCurrentCount = $execute_msCurrentCount['COUNT(DISTINCT(staffs.staffID))'];

  $response_staffStatistics = array('ebCurrentCount' => $ebCurrentCount, 'ebPastCount' => $ebPastCount, 'hebCurrentCount' => $hebCurrentCount, 'sehCurrentCount' => $sehCurrentCount, 'msCurrentCount' => $msCurrentCount);

  echo json_encode($response_staffStatistics);
}

function addStaff()
{
  require './../auth/dbConnect.php';
  date_default_timezone_set('Asia/Manila');

  $currentMonth = date('m');
  $currentYear = date('y');

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $position = $_POST['position'];
  $passwordmd5 = md5($password);

  $getLastStaffID = "SELECT staffID FROM staffs ORDER BY staffID DESC LIMIT 1";
  $resultLastStaffID = mysqli_query($dbConnect, $getLastStaffID);
  $rowLastStaffID = mysqli_fetch_array($resultLastStaffID);
  $getLastStaffIDdigits = substr($rowLastStaffID[0], -3);

  if ($getLastStaffIDdigits >= 0 && $getLastStaffIDdigits <= 8) {
    $getLastStaffIDdigits = $getLastStaffIDdigits + 1;
    $lastStaffIDdigits = "00" . $getLastStaffIDdigits;
  } elseif ($getLastStaffIDdigits >= 9 && $getLastStaffIDdigits <= 98) {
    $getLastStaffIDdigits = $getLastStaffIDdigits + 1;
    $lastStaffIDdigits = "0" . $getLastStaffIDdigits;
  } elseif ($getLastStaffIDdigits == "") {
    $lastStaffIDdigits = "001";
  } else {
    $getLastStaffIDdigits = $getLastStaffIDdigits + 1;
    $lastStaffIDdigits = $getLastStaffIDdigits;
  }

  $getCurrentAcadYear = "SELECT acadYear FROM ebyear WHERE status = 'Active'";
  $resultCurrentAcadYear = mysqli_query($dbConnect, $getCurrentAcadYear);
  $rowCurrentAcadYear = mysqli_fetch_array($resultCurrentAcadYear);
  $getCurrentAcadYearString  = substr($rowCurrentAcadYear[0], 2, 2) . substr($rowCurrentAcadYear[0], 7);

  $staffID = "CURSOR" . "-" . "STAFF" . "-" . $getCurrentAcadYearString . "-" . $lastStaffIDdigits;

  $username = str_replace(' ', '', strtolower($fName)) . "." . str_replace(' ', '', strtolower($lName)) . '_' . $lastStaffIDdigits;

  $addStaffQuery = "INSERT INTO staffs(staffID, username, password, status, emailAddress, fName, lName , role, position) VALUES ('$staffID','$username','$passwordmd5','Pending', '$email', '$fName', '$lName','$role','$position');";
  // $addEbStaffQuery = "INSERT INTO editorialboard( staffID, role, position, acadYear) VALUES (NULL, '$staffID','$role','$position','$rowCurrentAcadYear[0]');";
  $executeAddStaff = mysqli_query($dbConnect, $addStaffQuery);
  //$executeEbStaff = mysqli_query($dbConnect, $addEbStaffQuery);

  sendCredentials();

};

function getNewStaffID()
{
  require './../auth/dbConnect.php';
  date_default_timezone_set('Asia/Manila');

  $currentMonth = date('m');
  $currentYear = date('y');

  if ($currentMonth >= 8 && $currentMonth <= 12) {
    $academicYear = $currentYear . ($currentYear + 1);
  } elseif ($currentMonth >= 1 && $currentMonth <= 7) {
    $academicYear = ($currentYear - 1) . $currentYear;
  }

  $getLastStaffID = "SELECT staffID FROM staffs ORDER BY staffID DESC LIMIT 1";
  $resultLastStaffID = mysqli_query($dbConnect, $getLastStaffID);
  $rowLastStaffID = mysqli_fetch_array($resultLastStaffID);
  $getLastStaffIDdigits = substr($rowLastStaffID[0], -3);

  if ($getLastStaffIDdigits >= 0 && $getLastStaffIDdigits <= 8) {
    $getLastStaffIDdigits = $getLastStaffIDdigits + 1;
    $lastStaffIDdigits = "00" . $getLastStaffIDdigits;
  } elseif ($getLastStaffIDdigits >= 9 && $getLastStaffIDdigits <= 99) {
    $getLastStaffIDdigits = $getLastStaffIDdigits + 1;
    $lastStaffIDdigits = "0" . $getLastStaffIDdigits;
  } elseif ($getLastStaffIDdigits == "") {
    $lastStaffIDdigits = "001";
  } else {
    $lastStaffIDdigits = $getLastStaffIDdigits;
  }

  $newStaffID = "CURSOR" . "-" . "STAFF" . "-" . $academicYear . "-" . $lastStaffIDdigits;
  echo json_encode($newStaffID);
}

function viewStaff()
{
  require './../auth/dbConnect.php';

  $staffID = $_POST['staffID'];

  $viewStaffQuery = "SELECT staffs.staffID, staffs.fName, staffs.lName, staffs.bio, staffs.emailAddress, editorialboard.acadYear, editorialboard.image, editorialboard.role, editorialboard.position, staffs.username, staffs.password, staffs.status FROM staffs LEFT OUTER JOIN editorialboard ON staffs.staffID = editorialboard.staffID where staffs.staffID = '$staffID' ORDER BY editorialboard.acadYear ASC";
  $executeViewStaff = mysqli_query($dbConnect, $viewStaffQuery);

  while ($row = mysqli_fetch_array($executeViewStaff)) {
    $staffsInfo["staffID"] = $row["staffID"];
    $staffsInfo["fName"] = $row["fName"];
    $staffsInfo["lName"] = $row["lName"];
    $staffsInfo["bio"] = $row["bio"];
    $staffsInfo["emailAddress"] = $row["emailAddress"];
    $staffsInfo["position"] = $row["position"];
    $staffsInfo["role"] = $row["role"];
    $staffsInfo["image"] = $row["image"];
    $staffsInfo["status"] = $row["status"];
    $staffsInfo["username"] = $row["username"];
    $staffsInfo["acadYear"] = $row["acadYear"];
  }

  echo json_encode($staffsInfo);
}

function viewStaffImage()
{
  require './../auth/dbConnect.php';
  $staffID = $_POST['staffID'];
  $viewStaffImageQuery = "SELECT * FROM editorialboard  WHERE editorialboard.staffID = '$staffID' ORDER BY editorialboard.acadYear DESC;";
  $executeViewStaffImage = mysqli_query($dbConnect, $viewStaffImageQuery);

  echo json_encode($staffImage["image"] = mysqli_fetch_array($executeViewStaffImage));
}

function sendCredentials()
{
  require './../auth/dbConnect.php';

  $getLastStaffID = "SELECT username FROM staffs ORDER BY staffID DESC LIMIT 1";
  $resultLastStaffID = mysqli_query($dbConnect, $getLastStaffID);
  $rowLastStaffID = mysqli_fetch_array($resultLastStaffID);
  $newStaffID = $rowLastStaffID[0];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $fName = $_POST['fName'];

  $body = $newStaffID . "<br>" . $password;

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Port = "587";
  $mail->Username = "test.cursorcms@gmail.com";
  $mail->Password = "ndqpmlnrxtlzuvsc";
  $mail->Subject = "Test Mail";
  $mail->setFrom("test.cursorcms@gmail.com");
  $mail->Body = " $body";
  $mail->addAddress($email);

  $email_template = 'mail_signUp.html';
 
  $username = $newStaffID;
  $password = $password;
  
  $message = file_get_contents($email_template);
  $message = str_replace('%fname%', $fName, $message);
  $message = str_replace('%username%', $username, $message);
  $message = str_replace('%password%', $password, $message);
     
  $mail->MsgHTML($message);

  if ($mail->Send()) {
    echo "Mail Sent";
  } else {
    echo "Mail Not Sent";
  }

  $mail->smtpClose();
}

function checkMail()
{
  require '../auth/dbConnect.php';

  $addStaff_emailField = $_POST['addStaff_emailField'];

  $checkEmailQuery = "SELECT COUNT(*) FROM staffs WHERE emailAddress='$addStaff_emailField'";
  $executeCheckExistingEmail = mysqli_query($dbConnect, $checkEmailQuery);
  $rowCheckEmailExist = mysqli_fetch_array($executeCheckExistingEmail);

  if ($rowCheckEmailExist[0] == 1) {
    echo json_encode("exists");
  } else {
    echo json_encode("notExists");
  }
}

function printReport()
{
  require './../auth/dbConnect.php';

  class myPDF extends FPDF
  {
    function header()
    {
      $this->Image('./../resources/print/header.png', 0, 0, 220);
      $this->Ln(25);
      parent::Header();
    }

    function headerTable()
    {
      $academicYear = "2021 - 2022";
      $academicYear = "A.Y. " . $academicYear;

      $this->AddFont('Inter Regular', '', 'Inter-Regular.php');
      $this->AddFont('Inter Medium', '', 'Inter-Medium.php');
      $this->AddFont('Inter Bold', '', 'Inter-Bold.php');

      $this->SetFont('Inter Bold', '', 12);
      $this->Cell(0, 6, 'Editorial Board and Staffs', 0, 0, 'C');
      $this->Ln();

      $this->SetFont('Inter Medium', '', 12);
      $this->Cell(0, 6, $academicYear, 0, 0, 'C');
      $this->Ln(10);

      $this->SetDrawColor(140, 140, 140);
      $this->SetFillColor(255, 187, 51);
      $this->SetTextColor(26, 26, 26);

      $this->Cell(40, 10, 'Staff ID', 1, 0, 'C', true);
      $this->Cell(50, 10, 'Date', 1, 0, 'C', true);
      $this->Cell(40, 10, 'Time', 1, 0, 'C', true);
      $this->Cell(60, 10, 'Action', 1, 0, 'C', true);
      $this->Ln();
    }

    function viewTable($dbConnect)
    {
      $this->SetFont('Helvetica', '', 10);
      if (isset($_POST['filter_id']) and isset($_POST['filter_month'])) {
        $filter_id = $_POST['filter_id'];
        $filter_month = $_POST['filter_month'];
        $data = mysqli_query($dbConnect, "SELECT * FROM staffs");
      }

      // if (mysqli_num_rows($data) > 0) {
      //     while ($row = mysqli_fetch_array($data)) {
      //         $this->Cell(40, 10, $row['staffID'], 1, 0, 'L');
      //         $this->Cell(50, 10, $row['fName'], 1, 0, 'L');
      //         $this->Cell(40, 10, $row['mName'], 1, 0, 'L');
      //         $this->Cell(60, 10, $row['lName'], 1, 0, 'L');
      //         $this->Ln();
      //     }
      // } 

      else {
        $this->Cell(190, 10, "No Data Found.", 1, 0, 'L');
      }
    }

    function reportDetails()
    {
      date_default_timezone_set('Asia/Manila');

      $this->AddFont('Inter Regular', '', 'Inter-Regular.php');
      $this->AddFont('Inter Medium', '', 'Inter-Medium.php');
      $this->AddFont('Inter Bold', '', 'Inter-Bold.php');

      $this->Ln();

      $this->SetFont('Inter Bold', '', 10);
      $this->Cell(0, 6, 'Report Request Details', 0, 0, 'C');
      $this->Ln(10);

      $this->SetFont('Inter Medium', '', 10);
      $this->Cell(49, 5, "Requested by:", 0, 0);
      $this->SetFont('Inter Regular', '', 10);
      $this->Cell(49, 5, "First Name MI. Last Name", 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Ln();

      $this->SetFont('Inter Regular', '', 10);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, "Position - Role", 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, "", 0, 0);

      $this->Ln(7.5);

      $this->SetFont('Inter Medium', '', 10);
      $this->Cell(49, 5, "Time of Request:", 0, 0);
      $this->SetFont('Inter Regular', '', 10);
      $this->Cell(49, 5, date("F j, Y"), 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Ln();

      $this->SetFont('Inter Regular', '', 10);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, date("h:i A"), 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Cell(49, 5, "", 0, 0);
      $this->Ln();
    }

    function footer()
    {
      $this->SetY(-10);
      $this->SetFont('Helvetica', 'b', 8);
      $this->SetTextColor(204, 102, 0);
      $this->SetFillColor(255, 255, 255);
      $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / {nb}', 0, 0, 'R', true);
    }
  }

  $pdf = new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('P', 'Letter', 0);
  $pdf->headerTable();
  //$pdf->Image('./../resources/print/header.png',0 , 0,220,300); 
  // $pdf->SetFillColor(224,224,224);
  $pdf->viewTable($dbConnect);
  $pdf->reportDetails();
  // CLEAN THE previous output for the page. 
  ob_clean();
  // D: send to the browser and force a file download with the name given by name.
  $pdf->Output();
}
