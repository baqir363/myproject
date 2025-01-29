<?php

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
$pdf->MultiCell(0, 5, '1. Secretary to Vice Chancellor MCUT, DG Khan.
2. Treasurer, MCUT DG Khan.
3. Controller of Examinations, MCUT, DG Khan
4. All Incharges/HOD of the department MCUT DG Khan.
5. Resident Auditor, MCUT DG Khan.
6. Transport Officer, MCUT DG Khan.
7. Security Officer, MCUT DG Khan.
8. Estate Officer, MCUT DG Khan.
9. Office Copy.', 0, 'L');

$pdf->Output('notification.pdf', 'I');

        // $pdf->Output();
        exit; // Ensure no further code is executed
    }

// <?php
// require_once 'tcpdf/tcpdf.php';

// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator(PDF_CREATOR);

?>