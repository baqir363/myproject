<form method="POST">
    <input type="text" name="as" placeholder="Student Name" required autofocus/>
    <input type="submit" value="Add Student" name="sa"/>
</form>
<?php
if(isset($_POST['sa']))
{
    require_once("knfg.php");
    $er=$_POST['as'];
    $query="INSERT INTO attendencestudents(studentname) VALUE('$er')";
    $re=mysqli_query($db,$query) OR die(mysqli_error($db));
    echo "Students has been added Successfully!";
}

?>