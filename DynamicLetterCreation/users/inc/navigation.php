<!-- <link href="../../../../../Doctor-Appointment-System_PHP/dams/css/bootstrap.min.css" rel="stylesheet"> -->

<?php 

require_once("confg.php");
$result = mysqli_query($db, "SELECT * FROM dynamic");
while ($row = mysqli_fetch_assoc($result)) {
    $userid = $row['id'];
}
?>
<div class="row">
<div class="col-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg">
<div class="container">
    <!-- <img src="../assets/img/images (1).png" alt="image" height="100px" width="100px"><br> -->
    <!-- <a class="navbar-brand" href="ondx.php">Dynamic Letter</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="ondx.php?home=1">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ondx.php?composeletter=1">Compose Letter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ondx.php?letterhistory=1<?php 
                // echo $userid; 
                 ?>">Letter History</a>
            </li>
        </ul>
        <span class="navbar-text">
            Logged in as 
             <?php 
            echo $_SESSION['username']; 
            // echo $_SESSION['department'];
            ?>
        </span>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</div>
</nav>
