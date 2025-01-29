<?php
    if(isset($_GET['added']))
    {
        ?>
            <div class="alert alert-success my-3" role="alert">
                Candidate has been added successfully.
            </div>
        <?php
    }else if(isset($_GET['largeFile'])) {
        ?>
             <div class="alert alert-danger my-3" role="alert">
                Candidate image is too large, please upload small file (you can upload any image upto 2mbs.).
            </div>
        <?php
    }else if(isset($_GET['invalidFile']))
    {
        ?>
         <div class="alert alert-danger my-3" role="alert">
               Invalid image type (Only .jpg .png .jpeg files are allowed) .
            </div>
        <?php
    }else if(isset($_GET['failed']))
    {
        ?>
              <div class="alert alert-danger my-3" role="alert">
               Image uploading failed, please try again.
            </div>
        <?php
    }else if(isset($_GET['deleteid']))
    {
        mysqli_query($db,"DELETE FROM candidatedetails WHERE id = '".$_GET['deleteid']."'") OR die(mysqli_error($db));
        ?>
         <div class="alert alert-danger my-3" role="alert">
                Candidate has been deleted successfully!.
            </div>
        <?php
    }
?>


<div class="row my-3">
    <div class="col-4">
        <h3>Add New Candidates</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <select class="form-control" name="lkj" required>
                <option value=""> Select Election</option>
                    <?php
                        $fetchingElections = mysqli_query($db, "SELECT * FROM elections") OR die(mysqli_error($db));
                        $isAnyElectionAdded = mysqli_num_rows($fetchingElections);
                        if($isAnyElectionAdded > 0)
                        {
                            
                            while($row = mysqli_fetch_assoc($fetchingElections))
                            {
                                $elctionid = $row['id'];
                                $elctionname = $row['electiontopic'];

                                $allowedcandidates = $row['noofcandidates'];

                                // Now checking how many candidates are added in this election
                                $fetchinCandidate = mysqli_query($db,"SELECT * FROM candidatedetails WHERE numberid = '".$elctionid."'") or die(mysqli_error($db));
                                $addedcandidates = mysqli_num_rows($fetchinCandidate);

                                if($addedcandidates < $allowedcandidates) 
                                {
                                ?>
                                    <option value="<?php echo $elctionid; ?>"> <?php echo $elctionname; ?></option>
                                <?php
                                }
                            }
                          
                        }else {
                            ?>
                                    <option value=""> Please add election first </option>
                            <?php
                        }
                    ?>
               </select>
            </div>
            <div class="form-group">
                <input type="text" name="hgf" placeholder="Candidate Name" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="file" name="dsa" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" name="plm" placeholder="Candidate Datails" class="form-control" required />
            </div>
            <input type="submit" value="Add Candidate" name="addCandidateBtn" class="btn btn-success">
        </form>
    </div>
   
    <div class="col-8">
        <h3>Candidate Details</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Details</th>
      <th scope="col">Election</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
        <?php
            $fetchingData = mysqli_query($db,"SELECT * FROM candidatedetails") or die(mysqli_error($db));
            $isAnyCandidateAdded = mysqli_num_rows($fetchingData);

            if($isAnyCandidateAdded > 0)
            {
                $sno = 1;
                while($rows = mysqli_fetch_assoc($fetchingData))
                {
                    $elctionid = $rows['numberid'];
                    $fetchingElectionName = mysqli_query($db,"SELECT * FROM elections WHERE id ='".
                    $elctionid ."'") or die(mysqli_error($db));
                    $execfetchingElectionNameQuer = mysqli_fetch_assoc($fetchingElectionName);
                        $elctionname = $execfetchingElectionNameQuer['electiontopic'];    
                
                    $candidateid  = $rows['id'];
                    $candidatephoto = $rows['candidatephoto'];
                    
                    ?>
                            <tr>
                                <td><?php echo $sno++; ?></td>
                                <td> <img src="<?php echo $candidatephoto; ?>" class="candidate_photo"> </td>
                                <td><?php echo $rows['candidatename']; ?></td>
                                <td><?php echo $rows['candidatedetailed']; ?></td>
                                <td><?php echo $elctionname; ?></td>
                               <td>
                                <a href="ondx.php?editCandidateData=<?php echo $candidateid; ?>" class="btn btn-sm btn-warning"> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="DeleteData(<?php echo $candidateid; ?>)"> Delete</button>
                               </td>

                            </tr>
                    <?php
                }
            }else {
                ?>
                    <tr>
                        <td colspan="7"> No any Candidate is added yet. </td>
                    </tr>
                <?php
            }
        ?>
  </tbody>

</table>
    </div>
</div>

<script>
    const DeleteData = (e_id) =>
    {
        let c = confirm("Are you really want to delete it?");

        if(c == true)
        {
            location.assign("ondx.php?addCandidatePage=1&deleteid=" + e_id);
        }
    }
</script>

    
<?php

    if(isset($_POST['addCandidateBtn']))
    {
        $elctionid = mysqli_real_escape_string($db, $_POST['lkj']);
        $candidate_name = mysqli_real_escape_string($db, $_POST['hgf']);
       
        $candidate_details = mysqli_real_escape_string($db, $_POST['plm']);
        $inserted_by = $_SESSION['uzername'];
        $inserted_on = date("Y-m-d");

       //photograph Logic Starts
            $targetted_folder = "../assets/images/candidate_photos/";
            $candidatephoto =$targetted_folder . rand(111111111, 99999999999). "_".rand(111111111, 99999999999). $_FILES['dsa']['name'];
            $candidate_photo_tmp_name = $_FILES['dsa']['tmp_name'];
            $candidate_photo_type = strtolower(pathinfo($candidatephoto, PATHINFO_EXTENSION));
            $allowed_types =  array("jpg","png","jpeg");
            $image_size = $_FILES['dsa']['size'];

            if($image_size < 2000000)
            {
                if(in_array($candidate_photo_type, $allowed_types))
                {
                    if(move_uploaded_file($candidate_photo_tmp_name,$candidatephoto))
                    {
                        // inserting into db
                            mysqli_query($db,"INSERT INTO candidatedetails(numberid, candidatename,
                             candidatedetailed, candidatephoto,  insertedby, insertedon)VALUES('". $elctionid."','".$candidate_name."','".$candidate_details."','".$candidatephoto."','".$inserted_by. "','".$inserted_on."')") or die(mysqli_error($db));

                            echo "<script> location.assign('ondx.php?addCandidatePage=1&added=1');</script>";
                    }else {
                        echo "<script> location.assign('ondx.php?addCandidatePage=1&failed=1');</script>";    
                    }    
                }else {
                    echo "<script> location.assign('ondx.php?addCandidatePage=1&invalidFile=1');</script>";
                }

            }else {
                echo "<script> location.assign('ondx.php?addCandidatePage=1&largeFile=1');</script>";
            }



        //photograph Logic Ends
         
       

    }

?>
 

<?php

