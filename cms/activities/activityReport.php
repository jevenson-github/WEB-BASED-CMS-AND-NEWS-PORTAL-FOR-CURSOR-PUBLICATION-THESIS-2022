
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/datatables.min.js" defer></script>
    <!-- <script src="./../scripts/public/tinymce/tinymce.min.js" defer></script>
    <script src="./../scripts/public/tinymce-jquery/tinymce-jquery.min.js" defer></script> -->
    <script type="text/javascript" src="./../scripts/activities.js" defer></script>

    <title><?php echo $title ?> - CURSOR CMS</title>
</head>
<body>
      
<?php  
    require './../auth/dbConnect.php';
    require './../auth/session.php';
    require "../fpdf184/fpdf.php"; 


    class myPDF extends FPDF { 
        function header(){ 
            // Image
            $this->Image('../resources/print/header.png',0,0,220);
            $this->Ln(30); 
            // Center Title 
            $this->SetFont('Helvetica','b',15); 
            $this->MultiCell(0,0, 'ACTIVITY LOG REPORT' , $border=0, $align='C', $fill=false);
            // Address 
            $this->Ln(5);
            $this->SetFont('Helvetica','i',10);
            $this->Cell(0,10,'Bulacan State University - College of Information and Communications Technology',0,0,'C');
            $this->Ln(10);
            $this->SetFont('Helvetica','i',10);
            $this->Cell(187,0,'Guinhawa, City of Malolos, Bulacan',0,0,'C');
            $this->Ln(15);
    
            // Prepared by : 
            $this->SetFont('Helvetica','b',10); 
            $this->Cell(20,0,"Prepared by : \t\t\t\t",0,0,'L'); 
            $this->SetFont('Helvetica','',10); 
            $this->Cell(30,0,"\t\t\t\t\t\t".$_SESSION['fName'].''.$_SESSION['mName'].' '.$_SESSION['lName'],0,0,'L'); 
            // Date Printed
            $this->SetFont('Helvetica','b',10); 
            $this->Cell(105,0,"Date Printed :\t",0,0,'R'); 
            $this->SetFont('Helvetica','',10); 
            $this->Cell(20,0,"\t".date('F j, Y'),0,0,'L');
            $this->Ln(10);
            // Position
            $this->SetFont('Helvetica','b',10); 
            $this->Cell(26,0,"Position \t\t\t\t\t\t\t: \t\t\t",0,0,'L'); 
            $this->SetFont('Helvetica','',10); 
            $this->Cell(10,0,$_SESSION['position'],0,0,'L'); 
            $this->Ln(10);
            // Ensure table header is printed
            parent::Header(); 
        } 
        function headerTable(){
            $this->Ln(10);
            $this->SetFont('Helvetica','b',10);
            $this->SetDrawColor(140, 140, 140);
            $this->SetFillColor(255, 187, 51);
            $this->SetTextColor(26, 26, 26);
            $this->Cell(60,10,'Staff',1,0,'C',true);  
            $this->Cell(50,10,'Date',1,0,'C',true);
            $this->Cell(40,10,'Action',1,0,'C',true);
            $this->Cell(40,10,'Description',1,0,'C',true);
            $this->Ln(); 
            
          } 
          function viewTable($dbConnect){ 
            $this->SetFont('Helvetica','',10); 
            $data = mysqli_query($dbConnect, "SELECT * FROM activitylog LEFT JOIN staffs ON activitylog.staffID = staffs.staffID ORDER BY timestamp DESC");
            if (mysqli_num_rows($data) > 0) {
                    while ($row = mysqli_fetch_array($data)){ 
                        $this->Cell(60,10,$row['fName'].' '.$row['lName'],1,0,'L');
                        $this->Cell(50,10,date("F j Y", strtotime($row["timestamp"])).", \n".date("g:i A", strtotime($row["timestamp"])),1,0,'L');
                        $this->Cell(40,10,$row['action'],1,0,'L');
                        $this->Cell(40,10,$row['description'],1,0,'L');

                        $this->Ln();
                    }
                  }
                  else{
                    $this->Cell(190,10,"No Data Found.",1,0,'L');
                  }
            } 
            function footer(){
                $this->SetY(-10);
                $this->SetFont('Helvetica','b',8);
                $this->SetTextColor(204, 102, 0);
                $this->SetFillColor(255, 255, 255);
                $this->Cell(0,5,'Date Printed : Cursor Publication Admin | ' .date("F j, Y"). '  '.date("h:i:A"),0,0,'l',true);
                $this->Cell(5,5,'Page '.$this->PageNo().' / {nb}',0,0,'R',true);   
              } 
    }
    $pdf = new myPDF();
    // come from report.php 
    if(isset($_POST['generate'])){
        $pdf->AliasNbPages();
        $pdf->AddPage('P','A4',0);
        $pdf->headerTable();
        $pdf->viewTable($dbConnect);  
        // CLEAN THE previous output for the page. 
        ob_clean();
         // D: send to the browser and force a file download with the name given by name.
         $pdf->Output(); 
      }

?>

</body>
</html>