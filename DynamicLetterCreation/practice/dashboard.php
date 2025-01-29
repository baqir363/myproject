<?php
include("admin/inc/confg.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../indx.php");
    exit();
}


$username = $_SESSION['username'];

$sql = "SELECT * FROM users";
$result = $db->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header>
        <?php
        //  require_once("hdr.php");
        // require_once("dynamicletter.php");
        ?>
    </header>
<!-- 
<div class="container mt-4">
    <h2>User Dashboard</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Designation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // if ($result->num_rows > 0) {
            //     while($row = $result->fetch_assoc()) {
            //         echo "<tr>";
            //         echo "<td>" . $row['id'] . "</td>";
            //         echo "<td>" . $row['name'] . "</td>";
            //         echo "<td>" . $row['username'] . "</td>";
            //         echo "<td>" . $row['email'] . "</td>";
            //         echo "<td>" . $row['designation'] . "</td>";
            //         echo "</tr>";
            //     }
            // } else {
            //     echo "<tr><td colspan='5'>No users found</td></tr>";
            // }
            ?>
        </tbody>
    </table>
</div> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>