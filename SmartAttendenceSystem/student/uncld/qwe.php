
<?php

// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate attendance percentage
function calculateAttendance($student_id) {
    global $conn;
    
    $sql = "SELECT COUNT(*) as total_classes FROM attendance_table WHERE student_id = $student_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_classes = $row['total_classes'];
    } else {
        $total_classes = 0;
    }

    $sql = "SELECT COUNT(*) as present_classes FROM attendance_table WHERE student_id = $student_id AND status = 'present'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $present_classes = $row['present_classes'];
    } else {
        $present_classes = 0;
    }

    if ($total_classes > 0) {
        $attendance_percentage = ($present_classes / $total_classes) * 100;
    } else {
        $attendance_percentage = 0;
    }

    return $attendance_percentage;
}

// Get student name from input form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    
    // Check if student exists in database
    $sql = "SELECT * FROM student_table WHERE name = '$student_name'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_id = $row['id'];
        
        $attendance_percentage = calculateAttendance($student_id);
        
        if ($attendance_percentage >= 75) {
            echo "You are allowed to take the final term paper.";
        } else {
            echo "Your attendance is below 75%. You are not allowed to take the final term paper.";
        }
    } else {
        echo "Student not found.";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Student Name: <input type="text" name="student_name">
  <input type="submit">
</form>

</body>
</html>














function calculateAttendance($student_id) {
    global $conn;
    
    $sql = "SELECT COUNT(*) as totalclases FROM totalclasses WHERE studentid = $student_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_classes = $row['totalclases'];
    } else {
        $total_classes = 0;
    }

    $sql = "SELECT COUNT(*) as presentclases FROM totalclasses WHERE studentid = $student_id AND status = 'present'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $present_classes = $row['present_classes'];
    } else {
        $present_classes = 0;
    }

    if ($total_classes > 0) {
        $attendance_percentage = ($present_classes / $total_classes) * 100;
    } else {
        $attendance_percentage = 0;
    }

    return $attendance_percentage;
}

// Get student name from input form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    
    // Check if student exists in database
    $sql = "SELECT * FROM student_table WHERE name = '$student_name'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_id = $row['id'];
        
        $attendance_percentage = calculateAttendance($student_id);
        
        if ($attendance_percentage >= 75) {
            echo "You are allowed to take the final term paper.<br>";
        } else {
            echo "Your attendance is below 75%. You are not allowed to take the final term paper.<br>";
        }
        
        echo "Your attendance percentage is: " . round($attendance_percentage, 2) . "%";
    } else {
        echo "Student not found.";
    }
}

$conn->close();

?>