<?php


require_once("confg.php");
require_once('../fpdf/fpdf.php');

if (isset($_POST['printbtn'])) {
    $listofoffice = $_POST['listofoffice'];
    $number = $_POST['number'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = $_POST['from'];
    $designation = $_POST['designation'];
    // $cc = $_POST['cc'];
    $cc = isset($_POST['cc']) ? array_filter($_POST['cc']) : [];
    // $cc = implode("",$ccArray);
    $date = $_POST['date'];

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Add a header if needed
        }

        // Page footer
        function Footer()
        {
            // Add a footer if needed
        }
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->SetAuthor('Mir Chakar Khan Rind University of Technology');
    $pdf->SetTitle('Notification');
    $pdf->SetSubject('Youm-e-Takbeer Holiday');
    $pdf->SetKeywords('Youm-e-Takbeer, Holiday, MCUT');

    $pdf->AddPage();

    // Add image to the PDF
    $imagePath ='../assets/img/images (1).png';
    $pdf->Image($imagePath, 10, 5, 20, 20);

    $pdf->SetFont('helvetica', 'BU', 10);
    $pdf->Cell(0, 0, 'MIR CHAKAR KHAN RIND UNIVERSITY OF TECHNOLOGY', 0, 1, 'C');
    $pdf->Cell(0, 8, 'DERA GHAZI KHAN', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetTextColor(0, 0, 255);
    // $pdf->Link(50,60,50,10,'http://www.mcut.edu.pk','_blank');
    $pdf->Cell(0, 5, 'www.mcut.edu.pk E-mail: registrar@mcut.edu.pk', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 3, 'Phone No. 0333-6759924', 0, 1, 'C');
    $pdf->SetLineWidth(0.6);
    $pdf->Line(10, 30, 200, 30);

    $pdf->SetFont('helvetica', 'BU', 12);
    $pdf->Cell(0, 17, "$department", 0);
   
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 17, "No. MCUT-DGK/Admn. $number/1386", 0, 1, "R");
    $pdf->Cell(0, 10, "Dated: $date", 0, 1, 'R');
    $pdf->Cell(0, 10, "$to", 0, 1);
    $pdf->Cell(0, 8, "$subject", 0, 1);

    $pdf->SetFont('helvetica', 'BU', 12);
    $pdf->Cell(0, 20, 'NOTIFICATION', 0, 1, 'C');

    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, "$message", 0, 1);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 0, "$from", 0, 1,'R');
    $pdf->SetFont('helvetica', 'B', 12);
  
    $pdf->Cell(0, 10, "$designation", 0, 1,'R');
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'CC:', 0, 1,'L');
   
    $pdf->SetFont('helvetica', '', 12);
    // $x_coordinate_cc = 16;
    // $counter = 1;
    // do
    // {
        // $pdf->SetX($x_coordinate_cc);
        // $pdf->Cell(0, 5, "$ccArray", 0,1, 'L');
        // $counter++;
    // }
    // while($counter<=9);
//     $x_coordinate_cc = 16;
// $counter = 1;
// foreach ($ccArray as $item)
// {
//     $pdf->SetX($x_coordinate_cc);
//     $pdf->Cell(0, 5, "$counter. $item", 0,1, 'L');
//     $counter++;
// }


// $counter = 1;

// foreach ($ccArray as $item) {

//     $pdf->Cell(0, 5, "$counter.$item.", 0, 1, 'L');
//     $counter++;   
// }

$x_coordinate_cc = 16;
foreach ($cc as $key => $value) {
    $value = trim($value);
    $pdf->SetX($x_coordinate_cc);
    $pdf->Cell(0, 5, ($key + 1) . '. ' . $value . '.', 0, 1);
}

//  $pdf->MultiCell(0, 5,'    1. Secretary to Vice Chancellor MCUT, DG Khan.
//     2. Treasurer, MCUT DG Khan.
//     3. Controller of Examinations, MCUT, DG Khan
//     4. All Incharges/HOD of the department MCUT DG Khan.
//     5. Resident Auditor, MCUT DG Khan.
//     6. Transport Officer, MCUT DG Khan.
//     7. Security Officer, MCUT DG Khan.
//     8. Estate Officer, MCUT DG Khan.
//     9. Office Copy.', 0, 'L');
ob_clean();
    $pdf->Output('notification.pdf', 'I');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letter History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
    body {
            /* background-image: url('../assets/img/dynamic\ cover\ letter\ \(opt\).jpg'); */
             /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 50vh;
            margin: 0;
            font-family: Arial, sans-serif;
            /* color: #fff; */
            /* display: flex; */
            /* align-items: center; */
            /* justify-content: center; */
            text-align: left;
        }
        </style>
</head>
<body>

<div class="container-fluid mt-5">
    <!-- <div class="card"> -->
        <!-- <div class="card-header"> -->
            <h3>Letter History</h3>
        <!-- </div> -->
        
        <!-- <div class="card-body"> -->
            <table class="table" width="auto" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>List of Department</th>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>From</th>
                        <th>Designation</th>
                        <th>CC</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($db, "SELECT * FROM dynamic");
                    $data = mysqli_num_rows($result);
                    if( $data > 0)
                     { $sno = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $sno++ . "</td>";
                        echo "<td>" . $row['listofoffice'] . "</td>";
                        echo "<td>" . $row['tos'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td>" . $row['froms'] . "</td>";
                        echo "<td>" . $row['designation'] . "</td>";
                        // echo "<td>" . $row['cc'] . "</td>";
                        echo "<td>" .$row['cc'] . "</td>";
                        // foreach ($ccItems as $item) {
                        //     echo $item . "<br>";
                        // }
                        // echo "</td>";
                        echo "<td>" . $row['currdate'] . "</td>";
                        echo "<td>" . $row['lettermonth'] . "</td>";
                        echo "<td>" . $row['letteryear'] . "</td>";
                        ?>
                        <form method="POST">
                            <input type="hidden" name="listofoffice" value="<?php echo $row['listofoffice']; ?>">
                            <input type="hidden" name="number" value="<?php echo $row['number']; ?>">
                            <input type="hidden" name="to" value="<?php echo $row['tos']; ?>">
                            <input type="hidden" name="subject" value="<?php echo $row['subject']; ?>">
                            <input type="hidden" name="message" value="<?php echo $row['message']; ?>">
                            <input type="hidden" name="from" value="<?php echo $row['froms']; ?>">
                            <input type="hidden" name="designation" value="<?php echo $row['designation']; ?>">
                            <!-- <input type="hidden" name="cc[]" value="
                             <?php
                            //  echo $row['cc'];
                              ?>
                              "> -->
                            <?php
                           
                                $ccItems = array_map('trim', explode(".", $row['cc']));
                               
                                foreach ($ccItems as $item) {
                                    echo '<input type="hidden" name="cc[]" value="' . $item . '">';
                                }
                             
                                ?>
                            <input type="hidden" name="date" value="<?php echo $row['currdate']; ?>">
                            <td><button type='submit' class='btn btn-secondary' name='printbtn'>Print</button></td>
                        </form>
                        <?php
                        echo "</tr>";
                    }
                }
                    ?>
                </tbody>
            </table>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
</div>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>