<?php
    $electionid = $_GET['editData'];
    if(isset($_GET['update']))
    {
        ?>
            <div class="alert alert-success my-3" role="alert">
                Election has been Updated successfully.
            </div>
        <?php
    }
?>
<div class="row my-3">
    <div class="col-4">
        <h3>Election Edit</h3>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="zxc" placeholder="Election Topic" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="number" name="cxz" placeholder="No of Candidates" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" onfocus="this.type='Date'" name="vbn" placeholder="Starting Date" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" onfocus="this.type='Date'" name="nbv" placeholder="Ending Date" class="form-control" required />
            </div>
            <input type="submit" value="Update Election" name="updateElectionBtn" class="btn btn-success">
        </form>
    </div>
    
</div>

<?php

if(isset($_POST['updateElectionBtn']))
    {
        $election_topic = mysqli_real_escape_string($db, $_POST['zxc']);
        $number_of_candidates = mysqli_real_escape_string($db, $_POST['cxz']);
        $starting_date = mysqli_real_escape_string($db, $_POST['vbn']);
        $ending_date = mysqli_real_escape_string($db, $_POST['nbv']);
        $inserted_by = $_SESSION['uzername'];
        $inserted_on = date("Y-m-d");


        $date1 = date_create($inserted_on);
        $date2 = date_create($starting_date);
        $diff = date_diff($date1,$date2);


        if((int)$diff->format("%R%a") > 0)
        {
            $status = "InActive";
        }else{
            $status = "Active";
        }
         
        // inserting into db
        mysqli_query($db,"UPDATE elections SET electiontopic ='$election_topic', noofcandidates = '$number_of_candidates',
         startingdate = '$starting_date', endingdate = '$ending_date', status ='$status', insertedby = '$inserted_by',
        insertedon = '$inserted_on' WHERE id= '$electionid'") or die(mysqli_error($db));

        ?>
    <script> location.assign("ondx.php?editData&update=1")</script>
   
<?php

    }