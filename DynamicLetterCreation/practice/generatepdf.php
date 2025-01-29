<?php
require('../fpdf/fpdf.php');

// Database connection
require_once("../confg.php");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letterId = $_POST['id'];

    // Fetch the letter from the database
    $sql = "SELECT * dynamic WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $letterId);
    $stmt->execute();
    // $stmt->bind_result($title, $content);
    $stmt->fetch();
    $stmt->close();
    $db->close();

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    // $pdf->Cell(0, 10, $title, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    // $pdf->MultiCell(0, 10, $content);

    $pdf->Output('notification.pdf', 'I'); // 'D' for download
}
?>