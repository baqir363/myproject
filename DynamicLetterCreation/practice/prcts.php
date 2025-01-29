<?php
require_once("../confg.php");
require_once('../fpdf/fpdf.php');

if (isset($_POST['printbtn'])) {
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
        }

        // Page footer
        function Footer()
        {
        }
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->SetAuthor('Mir Chakar Khan Rind University of Technology');
    $pdf->SetTitle('Notification');
    $pdf->SetSubject('Youm-e-Takbeer Holiday');
    $pdf->SetKeywords('Youm-e-Takbeer, Holiday, MCUT');
    $pdf->AddPage();

    $imagePath = '../img/images (1).png';
    $pdf->Image($imagePath, 10, 5, 20, 20);
    $pdf->SetFont('helvetica', 'BU', 10);
    $pdf->Cell(0, 0, 'MIR CHAKAR KHAN RIND UNIVERSITY OF TECHNOLOGY', 0, 1, 'C');
    $pdf->Cell(0, 8, 'DERA GHAZI KHAN', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetTextColor(0, 0, 255);
    $pdf->Cell(0, 5, 'www.mcut.edu.pk E-mail: registrar@mcut.edu.pk', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 3, 'Phone No. 0333-6759924', 0, 1, 'C');
    $pdf->SetLineWidth(0.6);
    $pdf->Line(10, 30, 200, 30);
    $pdf->SetFont('helvetica', 'BU', 12);
    $pdf->Cell(0, 17, "", 0);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 17, "No. MCUT-DGK/Admn. /1386", 0, 1, "R");
    $pdf->Cell(0, 10, "Dated: ", 0, 1, 'R');
    $pdf->Cell(0, 8, "", 0, 1);
    $pdf->SetFont('helvetica', 'BU', 12);
    $pdf->Cell(0, 20, 'NOTIFICATION', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, "", 0, 1);
    $pdf->Cell(0, 0, "", 0, 1, 'R');
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 8, "", 0, 1, 'R');

    // Add CC to PDF
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'CC:', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);

    if (isset($_POST['selected_cc'])) {
        foreach ($_POST['selected_cc'] as $cc) {
            $pdf->Cell(0, 5, $cc, 0, 1, 'L');
        }
    }

    $pdf->Output('notification.pdf', 'I');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mir Chakar Khan Rind University of Technology</title>
	<style>
		.notification {
			background-color: #f0f0f0;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		h2 {
			margin-top: 0;
		}
		
		p {
			margin-bottom: 20px;
		}
		
		.address {
			font-size: 14px;
			color: #666;
		}
		
		.phone {
			font-size: 14px;
			color: #666;
		}
		
		.email {
			font-size: 14px;
			color: #666;
		}
		
		.cc {
			font-size: 14px;
			color: #666;
		}
	</style>
</head>
<body>
	<div class="notification">
		<h2>Mir Chakar Khan Rind University of Technology</h2>
		<p class="address">Dera Ghazi Khan</p>
		<p class="phone">Phone No. 0333-6759924</p>
		<p class="email">E-mail: <a href="mailto:registrar@mcut.edu.pk">registrar@mcut.edu.pk</a></p>
		<p class="website">www.mcut.edu.pk</p>
		<hr>
		<p>Office of the Registrar</p>
		<p>No. MCUT-DGK/Admn.23/1386</p>
		<p>Dated: 27-05-2024</p>
		<hr>
		<h2>NOTIFICATION</h2>
		<p>Pursuant to Press release No. 10-01/2024-Min-II dated May 27, 2024, issued by the Government of Pakistan, Cabinet Secretariat, Cabinet Division, the Competent Authority is pleased to announce that Mir Chakar Khan Rind University of Technology, Dera Ghazi Khan, shall remain closed on <span>Tuesday, May 28, 2024</span> in observance of Youm-e-Takbeer.</p>
		<p>However, the Estate staff and Security Personnel of the university shall perform their duties as usual and shall remain vigilant.</p>
		<p>Muhammad Arif Khan<br>Registrar</p>
		<hr>
		<p class="cc">CC:</p>
		<p class="cc">1. Secretary to Vice Chancellor MCUT, DG Khan.</p>
		<p class="cc">2. Treasurer, MCUT DG Khan.</p>
		<p class="cc">3. Controller of Examinations, MCUT, DG Khan</p>
		<p class="cc">4. All Incharges/HOD of the department MCUT DG Khan.</p>
		<p class="cc">5. Resident Auditor, MCUT DG Khan.</p>
		<p class="cc">6. Transport Officer, MCUT DG Khan.</p>
		<p class="cc">7. Security Officer, MCUT DG Khan.</p>
		<p class="cc">8. Estate Officer, MCUT DG Khan.</p>
		<p class="cc">9. Office Copy.</p>
	</div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letter History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <?php require_once("../user/hdr.php"); ?>
</header>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Letter History</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>List of Office</th>
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
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($db, "SELECT * FROM dynamic");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['listofoffice'] . "</td>";
                            echo "<td>" . $row['tos'] . "</td>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['message'] . "</td>";
                            echo "<td>" . $row['froms'] . "</td>";
                            echo "<td>" . $row['designation'] . "</td>";
                            echo "<td>" . $row['cc'] . "</td>";
                            echo "<td>" . $row['currdate'] . "</td>";
                            echo "<td>" . $row['lettermonth'] . "</td>";
                            echo "<td>" . $row['letteryear'] . "</td>";
                            echo "<td><button type='submit' class='btn btn-secondary' name='printbtn'>Print</button></td>";
                            echo "<td><input type='checkbox' name='selected_cc[]' value='" . $row['cc'] . "'></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
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
    $cc = isset($_POST['cc']) ? $_POST['cc'] : [];

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
        $cc_string = implode(", ", $cc);
        mysqli_query($db, "INSERT INTO dynamic(listofoffice,tos,subject,number,message,froms,designation,cc,currdate,lettermonth,letteryear)
        VALUES('" . $listofoffice . "','" . $to . "','" . $subject . "','".$number."','" . $message . "','" . $from . "','" . $designation . "','" . $cc_string . "',
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
// $pdf->Cell(0, 10, 'No. MCUT-DGK/Admn.23/1386', 0,
    }
}

                         // automatically
// Database connection
require_once("../confg.php");

// Start session
// session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from database
$user_id = $_SESSION['user_id'];
$query = "SELECT department FROM users WHERE id = '$user_id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$department = $row['department'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form method="POST">
        <label for="department">Department:</label>
        <select name="department" id="department">
            <option value="IT" <?php if ($department == 'IT') echo 'selected'; ?>>IT</option>
            <option value="HR" <?php if ($department == 'HR') echo 'selected'; ?>>HR</option>
            <option value="Finance" <?php if ($department == 'Finance') echo 'selected'; ?>>Finance</option>
            <option value="Marketing" <?php if ($department == 'Marketing') echo 'selected'; ?>>Marketing</option>
            <!-- Add other departments as needed -->
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>