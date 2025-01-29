<?php

require_once("../confg.php");
require_once('../fpdf/fpdf.php'); // Use require_once instead of require


if (isset($_POST['createbtn']) || isset($_POST['printbtn'])) {
    $listofoffice = mysqli_real_escape_string($db, $_POST['lis']);
    $to = mysqli_real_escape_string($db, $_POST['to']);
    $subject = mysqli_real_escape_string($db, $_POST['sub']);
    $number = mysqli_real_escape_string($db, $_POST['num']);
    $message = mysqli_real_escape_string($db, $_POST['mess']);
    $from = mysqli_real_escape_string($db, $_POST['fro']);
    $designation = mysqli_real_escape_string($db, $_POST['des']);
    // $cc = mysqli_real_escape_string($db, $_POST['cc']);
    $ccArray = isset($_POST['cc']) ? $_POST['cc'] : [];
    // $cc = isset($_POST['cc']) ? $_POST['cc'] : [];
    $cc = implode(",",$ccArray);



    date_default_timezone_set("Asia/Karachi");
    $currtime = date("h:i:s a");

    // Date Logic Starts
    if ($_POST['selected_date'] == NULL) {
        $selected_date = date("d-m-y");
    } else {
        $selected_date = $_POST['selected_date'];
    }
    // Date Logic Ends
    $letter_month = date("M", strtotime($selected_date));
    $letter_year = date("Y", strtotime($selected_date));

    // Insert data into the database if createbtn is clicked
    if (isset($_POST['printbtn'])) {
        // $cc_string = implode(", ", $cc);
        mysqli_query($db, "INSERT INTO dynamic(listofoffice,tos,subject,number,message,froms,designation,cc,currdate,lettermonth,letteryear)
        VALUES('" . $listofoffice . "','" . $to . "','" . $subject . "','".$number."','" . $message . "','" . $from . "','" . $designation . "','" . $cc . "',
        '" . $selected_date . "','" . $letter_month . "','" . $letter_year . "')") or
            die(mysqli_error($db));
    }
    // Generate PDF if printbtn is clicked
    if (isset($_POST['printbtn'])) {
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // $this->SetFont('Arial', 'B', 12);
                // $this->Cell(0, 10, 'MIR CHAKKAR KHAN RIND UNIVERSITY OF TECHNOLOGY DERA GHAZI KHAN', 0, 1, 'C');
                // $this->Ln(10);
            }

            // Page footer
            function Footer()
            {
                // $this->SetY(-15);
                // $this->SetFont('Arial', 'I', 8);
                // $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        $pdf = new PDF('P','mm','A4');
        // $pdf->AliasNbPages();
        // $pdf->AddPage();
        // $pdf->SetFont('Arial', 'B', 12);

        // $pdf->Cell(0, 10, "List of Office: $listofoffice", 0, 1);
        // $pdf->Cell(0, 10, "To: $to", 0, 1);
        // $pdf->Cell(0, 10, "Subject: $subject", 0, 1);
        // $pdf->Cell(0, 10, "Number: $number", 0, 1);
        // $pdf->MultiCell(0, 10, "Message: $message", 0, 1);
        // $pdf->Cell(0, 10, "From: $from", 0, 1);
        // $pdf->Cell(0, 10, "Designation: $designation", 0, 1);
        // $pdf->Cell(0, 10, "CC: $cc", 0, 1);
        // $pdf->Cell(0, 10, "Date: $selected_date", 0, 1);
        $pdf->SetAuthor('Mir Chakar Khan Rind University of Technology');
$pdf->SetTitle('Notification');
$pdf->SetSubject('Youm-e-Takbeer Holiday');
$pdf->SetKeywords('Youm-e-Takbeer, Holiday, MCUT');

$pdf->AddPage();

// $pdf->SetFont('helvetica', 'B', 10);
// Set image file path
$imagePath = '../img/images (1).png';

// Add image to the PDF
// Parameters: file path, x position, y position, width (optional), height (optional)
$pdf->Image($imagePath, 10, 5, 20, 20);
$pdf->SetFont('helvetica', 'BU', 10);
$pdf->Cell(0, 0, 'MIR CHAKAR KHAN RIND UNIVERSITY OF TECHNOLOGY', 0, 1, 'C');
$pdf->Cell(0, 8, 'DERA GHAZI KHAN', 0, 1, 'C');
$pdf->SetFont('helvetica', 'U', 10);
$pdf->SetTextColor(0, 0, 255);


$pdf->Cell(0, 5, 'www.mcut.edu.pk E-mail: registrar@mcut.edu.pk', 0, 1, 'C');
// $pdf->Cell(0, 8, 'E-mail: registrar@mcut.edu.pk', 0, 1, 'C');
// Reset text color back to default (black)
$pdf->SetTextColor(0, 0, 0);
// Set text color to blue (RGB: 0, 0, 255)


// Create a link
// $link = $pdf->AddLink();

// Add a clickable link text with blue color
// $pdf->Write(10, 'Click here to visit FPDF.org', $link);

// Set link to a URL
// $pdf->SetLink($link, 0, 'http://www.fpdf.org');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 3, 'Phone No. 0333-6759924', 0, 1, 'C');
// Set the line width (optional)
$pdf->SetLineWidth(0.6);

// Draw a line from (10, 10) to (200, 10)
$pdf->Line(10, 30, 200, 30);

// Draw another line from (10, 20) to (200, 20)
// $pdf->Line(10, 20, 200, 20);
$pdf->SetFont('helvetica', 'BU', 12);
// $pdf->Cell(0, 10, 'Office of the Registrar', 0, 1, 'L');
 $pdf->Cell(0, 17, "$listofoffice", 0);
 $pdf->SetFont('helvetica', '', 12);
 $pdf->Cell(0, 17, "No. MCUT-DGK/Admn. $number/1386", 0, 1,"R");
 $pdf->Cell(0, 10, "Dated: $selected_date", 0, 1,'R');
        $pdf->Cell(0, 0, "$to", 0, 1);
        $pdf->Cell(0, 8, "$subject", 0, 1);
// $pdf->Cell(0, 10, 'No. MCUT-DGK/Admn.23/1386', 0, 1, 'L');
        // $pdf->Cell(0, 10, "No. MCUT-DGK/Admn. $number/1386", 0, 1,'L');

// $pdf->Cell(0, 10, 'Dated: 27-05-2024', 0, 1, 'L');

$pdf->SetFont('helvetica', 'BU', 12);
$pdf->Cell(0, 20, 'NOTIFICATION', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 12);
// $pdf->MultiCell(0, 10, 'Pursuant to Press release No. 10-01/2024-Min-II dated May 27, 2024, issued by the Government of Pakistan, Cabinet Secretariat, Cabinet Division, the Competent Authority is pleased to announce that Mir Chakar Khan Rind University of Technology, Dera Ghazi Khan, shall remain closed on Tuesday, May 28, 2024, in observance of Youm-e-Takbeer.', 0, 'L');
// $pdf->MultiCell(0, 10, 'However, the Estate staff and Security Personnel of the university shall perform their duties as usual and shall remain vigilant.', 0, 'L');
 $pdf->MultiCell(0, 10, "$message", 0, 1);
$pdf->SetFont('helvetica', '', 12);
// $pdf->Cell(0, 10, 'Muhammad Arif Khan', 0, 1, 'L');
// $pdf->Cell(0, 10, 'Registrar', 0, 1, 'L');
  $pdf->Cell(0, 0, "$from", 0, 1,'R');
  $pdf->SetFont('helvetica', 'B', 12);
  
        $pdf->Cell(0, 8, "$designation", 0, 1,'R');

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'CC:', 0, 1, 'L');
$pdf->SetFont('helvetica', '', 12);
$x_coordinate_cc = 16;
$counter = 1;
foreach ($ccArray as $item)
{
    $pdf->SetX($x_coordinate_cc);
    $pdf->Cell(0, 5, "$counter. $item", 0,1, 'L');
    $counter++;
}

// $ccLines = explode(",",$cc);
// foreach ($ccLines as $indx => $ccLine){
//     $pdf->MultiCell(0, 5, ($indx + 1) . ". $ccLine",0,'L');
// }
// $pdf->MultiCell(0, 5, ''
// '
// // 1. Secretary to Vice Chancellor MCUT, DG Khan.
// // 2. Treasurer, MCUT DG Khan.
// // 3. Controller of Examinations, MCUT, DG Khan
// // 4. All Incharges/HOD of the department MCUT DG Khan.
// // 5. Resident Auditor, MCUT DG Khan.
// // 6. Transport Officer, MCUT DG Khan.
// // 7. Security Officer, MCUT DG Khan.
// // 8. Estate Officer, MCUT DG Khan.
// // 9. Office Copy.
// '
// , 0, 'L');

$pdf->Output('notification.pdf', 'I');

        // $pdf->Output();
        exit; // Ensure no further code is executed
    }
}
// <?php
// require_once 'tcpdf/tcpdf.php';

// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator(PDF_CREATOR);



?>


<!-- ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Letter Creation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
        <?php require_once("../user/hdr.php"); ?>
    </header>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
        <!-- <img src="img/images (1).png" alt="logo" width="100px" height="100px">
        <center> <h3><b><u>MIR CHAKAR KHAN RIND UNIVERSITY OF TECHNOLOGY <br> DERA GHAZI KHAN</b></u></h3></center>
       
        
        
        <center><a href="www.mcut.edu.pk">www.mcut.edu.pk</a> <a href="Email: registrar@mcut.edu.pk">Email: registrar@mcut.edu.pk</a>
        <br><b>Phone .No. 0333-6759924</b></center>
        <hr> -->
        <h3>Dynamic create Letter</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="list">List of Department</label>
                    <select class="form-control" name="lis" id="list">
                        <option value="as">--Select Department--</option>
                        <option value="Office of the Registrar">Office of the Registrar</option>
                        <option value="IET">Office of IET</option>
                        <option value="IT">Office of IT</option>
                        <option value="CS">Office of CS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="to">To</label>
                    <!-- <select class="form-control" name="to" id="to">
                        <option value="as">--Select To--</option>
                        <option value="Dr.shafiq">Dr.Shafiq</option>
                        <option value="Ali">Sir.Ali raza</option>
                        <option value="Aown">Sir.Aown</option>
                        <option value="Haseeb">Sir.Haseeb</option>
                    </select> -->
                    <input type="text" name="to" id="to" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="sub" id="subject">
                </div>
                <div class="form-group">
                    <label for="num">No. MCUT-DGK/Admn.</label>
                    <input type="number" class="form-control" name="num" id="num">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="mess" id="message" cols="50" rows="4" placeholder="Text Area"></textarea>
                </div>

                <div class="form-group">
                    <label for="from">From</label>
                    <select class="form-control" name="fro" id="from">
                        <option value="sa">--Select From--</option>
                        <option value="Muhammad Arif Khan">Muhammad Arif Khan</option>
                        <option value="Dr.shafiq">Dr.Shafiq</option>
                        <option value="Ali">Sir.Ali raza</option>
                        <option value="Aown">Sir.Aown</option>
                        <option value="Haseeb">Sir.Haseeb</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <select class="form-control" name="des" id="designation">
                        <option value="da">--Select Designation--</option>
                        <option value="Vice Chancellor"><b>Vice Chancellor</b></option>
                        <option value="Registrar"><b>Registrar</b></option>
                        <option value="HOD"><b>HOD</b></option>
                    </select>
                </div>

                <!-- <div class="form-group">
                    <label for="cc">CC:</label>
                    <select class="form-control" name="cc" id="cc">
                        <option value="fa">--Select CC--</option>
                        <option value="sec"> Secretary to Vice Chancellor, MCUT DG Khan.</option>
                        <option value="tre">Treasurer MCUT DG Khan.</option>
                        <option value="res">Resident Auditor, MCUT DG Khan.</option>
                        <option value="cont">Controller Examination MCUT DG Khan.</option>
                        <option value="inc">Incharge/HOD Computing & Information Technology.</option>
                        <option value="tra">Transport Officer MCUT DG Khan.</option>
                        <option value="est">Estate Officer, MCUT DG Khan.</option>
                        <option value="secu">Security Officer, MCUT DG Khan.</option>
                        <option value="off">Office Copy.</option>
                    </select>
                </div> -->

                <div class="form-group">
    <label for="cc">CC:</label><br>
    <input type="checkbox" name="cc[]" value="Secretary to Vice Chancellor, MCUT DG Khan." required> Secretary to Vice Chancellor, MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Treasurer MCUT DG Khan."> Treasurer MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Resident Auditor, MCUT DG Khan."> Resident Auditor, MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Controller Examination MCUT DG Khan."> Controller Examination MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Incharge/HOD Computing & Information Technology."> Incharge/HOD Computing & Information Technology.<br>
    <input type="checkbox" name="cc[]" value="Transport Officer MCUT DG Khan."> Transport Officer MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Estate Officer, MCUT DG Khan."> Estate Officer, MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Security Officer, MCUT DG Khan."> Security Officer, MCUT DG Khan.<br>
    <input type="checkbox" name="cc[]" value="Office Copy."> Office Copy.<br>
</div>
                <div class="form-group">
                    <label for="selected_date">Date</label>
                    <input type="date" class="form-control" name="selected_date" required>
                </div>

                <!-- <button type="submit" class="btn btn-primary" name="createbtn">Create</button> -->
                <button type="submit" class="btn btn-secondary" name="printbtn">Print</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>