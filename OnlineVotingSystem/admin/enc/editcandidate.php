<?php
 $candidateid = $_GET['editCandidateData'];
 if(isset($_GET['update']))
 {
     ?>
         <div class="alert alert-success my-3" role="alert">
             Candidate has been Updated successfully.
         </div>
     <?php
 }
?>


<div class="row my-3">
    <div class="col-4">
        <h3>Edit Candidates</h3>
        <form method="POST" enctype="multipart/form-data">
            <!-- <div class="form-group"> -->
               <!-- <select class="form-control" name="lkj"> -->
                <!-- <option value=""> Select Election</option> -->
                    <?php
                        $fetchingElections = mysqli_query($db, "SELECT * FROM elections") OR die(mysqli_error($db));
                        $isAnyElectionAdded = mysqli_num_rows($fetchingElections);
                        if($isAnyElectionAdded > 0)
                        {
                            while($row = mysqli_fetch_assoc($fetchingElections))
                            {
                                $elctionid = $row['id'];
                                $election_name = $row['electiontopic'];

                                $allowed_candidates = $row['noofcandidates'];

                                // Now checking how many candidates are added in this election
                                $fetchinCandidate = mysqli_query($db,"SELECT * FROM candidatedetails WHERE 
                                numberid = '".$elctionid."'") or die(mysqli_error($db));
                                $added_candidates = mysqli_num_rows($fetchinCandidate);
                                
                                if($added_candidates < $allowed_candidates)
                                {
                            //     ?>
                            <!-- //         <option value="<?php 
                            // echo $elctionid; 
                               ?>">  -->
                              <?php 
                            //  echo $election_name;
                              ?>
                              <!-- </option> -->
                                 <?php
                                }
                            }
                        }else {
                            ?>
                                    <!-- <option value=""> Please Update Candidate first </option> -->
                            <?php
                        }
                    ?>
               <!-- </select> -->
            <!-- </div> -->
            <div class="form-group">
                <input type="text" name="hgf" placeholder="Candidate Name" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="file" name="dsa" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" name="plm" placeholder="Candidate Datails" class="form-control" required />
            </div>
            <input type="submit" value="Edit Candidate" name="editCandidateBtn" class="btn btn-success">
        </form>
    </div>
   
   
</div>
    
<?php

    if(isset($_POST['editCandidateBtn']))
    {
        $elctionid = mysqli_real_escape_string($db, $_POST['lkj']);
        $candidatename = mysqli_real_escape_string($db, $_POST['hgf']);
       
        $candidate_details = mysqli_real_escape_string($db, $_POST['plm']);
        $inserted_by = $_SESSION['uzername'];
        $inserted_on = date("Y-m-d");

       //photograph Logic Starts
            $targetted_folder = "../assets/images/candidate_photos/";
            $candidate_photo =$targetted_folder . rand(111111111, 99999999999). "_".rand(111111111, 99999999999).
            $_FILES['dsa']['name'];
            $candidate_photo_tmp_name = $_FILES['dsa']['tmp_name'];
            $candidate_photo_type = strtolower(pathinfo($candidate_photo, PATHINFO_EXTENSION));
            $allowed_types =  array("jpg","png","jpeg");
            $image_size = $_FILES['dsa']['size'];

            if($image_size < 2000000)
            {
                if(in_array($candidate_photo_type, $allowed_types))
                {
                    if(move_uploaded_file($candidate_photo_tmp_name,$candidate_photo))
                    {
                        // inserting into db
            mysqli_query($db,"UPDATE candidatedetails SET candidatename = '$candidatename',
             candidatedetailed = '$candidate_details', candidatephoto = '$candidate_photo', insertedby ='$inserted_by', insertedon = '$inserted_on' WHERE id = '$candidateid'") 
            or die(mysqli_error($db));
           
                            echo " <script> location.assign('ondx.php?editCandidateData&update=1')</script>";
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
         
       ?>
        
       
        <?php
    }

?>
 

<?php

