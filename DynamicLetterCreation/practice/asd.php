<?php

require_once('../fpdf/fpdf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, $title, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $content);

    $pdf->Output('D', 'letter.pdf'); // 'D' for download
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Letters</title>
    <style>
        .letter {
            border: 1px solid #000;
            margin: 10px;
            padding: 10px;
        }
        .print-button {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
        <div class="letter" id="letter1">
        <h2>Letter 1</h2>
        <p>This is the content of the first letter.</p>
        <button class="print-button" onclick="generatePDF('Letter 1', 'This is the content of the first letter.')">Print</button>
    </div>
    <div class="letter" id="letter2">
        <h2>Letter 2</h2>
        <p>This is the content of the second letter.</p>
        <button class="print-button" onclick="generatePDF('Letter 2', 'This is the content of the second letter.')">Print</button>
    </div>
    
    <!-- Add more letters as needed -->

    <script>
        function generatePDF(title, content) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'generate_pdf.php';

            const titleField = document.createElement('input');
            titleField.type = 'hidden';
            titleField.name = 'title';
            titleField.value = title;
            form.appendChild(titleField);

            const contentField = document.createElement('input');
            contentField.type = 'hidden';
            contentField.name = 'content';
            contentField.value = content;
            form.appendChild(contentField);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>