<?php
// Database connection
require_once("../confg.php");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all letters from the database
$sql = "SELECT id,title,content FROM dynamic";
$result = $db->query($sql);

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
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="letter" id="letter<?php echo $row['id']; ?>">
            <h2>
                <?php
                //  echo htmlspecialchars($row['title']); 
                 ?>
            </h2>
            <p><?php
            //  echo nl2br(htmlspecialchars($row['content'])); 
             ?></p>
            <button class="print-button" onclick="generatePDF(<?php echo $row['id']; ?>)">Print</button>
        </div>
    <?php endwhile; ?>
    
    <script>
        function generatePDF(letterId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'generatepdf.php';

            const idField = document.createElement('input');
            idField.type = 'hidden';
            idField.name = 'id';
            idField.value = letterId;
            form.appendChild(idField);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>

<?php
$db->close();
?>