<?php
    require_once("inc/header.php");
    require_once("inc/navigation.php");
?>

    <div class="row my-3">
        <div class="col-12">
            <h3> Voters Panel</h3>


            <?php

                $fetchingActiveElection = mysqli_query($db,"SELECT * FROM elections WHERE status = 'Active'") or die(mysqli_error($db));
                 $totalActiveElections = mysqli_num_rows($fetchingActiveElection);

                 if($totalActiveElections > 0)
                 {
                    while($data = mysqli_fetch_assoc($fetchingActiveElection))
                    {
                        $electionid = $data['id'];
                        $election_topic = $data['electiontopic'];

                        ?>
                         <table class="table">
                <thead>
                    <tr>
                        <th colspan="4" class="bg-green text-white"> <h5>ELECTION TOPIC: <?php echo strtoupper($election_topic);  ?></h5></th>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <th>Candidate Details</th>
                        <th># of Votes</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fetchingCandidates = mysqli_query($db,"SELECT * FROM candidatedetails WHERE numberid = '". $electionid."'") or die(mysqli_error($db));

                      
                        while( $candidateData = mysqli_fetch_assoc($fetchingCandidates))
                        {
                            $candidate_id = $candidateData['id'];
                            $candidate_photo = $candidateData['candidatephoto'];
                            $candidatevotes = $candidateData['noofvotes'];
                            // Fetching Candidate Votes
                           
                              ?>
                                <tr>
                                    <td> <img src="<?php echo $candidate_photo;  ?>" class="candidate_photo"></td>
                                    <td> <?php echo "<b>". $candidateData['candidatename'] . "</b><br />".  $candidateData['candidatedetailed']; ?></td>
                                    <td> <?php echo $candidatevotes; ?></td>
                                   
                                    <td>
                                        <?php
                                        $chechIfVoteCasted  = mysqli_query($db,"SELECT * FROM votings WHERE votersid = '". $_SESSION['uzerid']."' AND elctionid = '".$electionid."'") or die(mysqli_error($db));
                                        $isVoteCasted = mysqli_num_rows($chechIfVoteCasted);


                                        
                                        if($isVoteCasted > 0)
                                        {
                                            $voteCastedData = mysqli_fetch_assoc($chechIfVoteCasted);
                                            $voteCastedToCandidate = $voteCastedData['candidateid'];

                                            if($voteCastedToCandidate == $candidate_id)
                                            {

                                                ?>
                                                <img src="../assets/images/vote.png" width="100px">

                                                <?php
                                            }
                                         
                                        }else {
                                            ?>
                                            
                                                <button class="btn btn-md btn-success" onclick="CastVote(<?php echo $electionid; ?>, <?php echo $candidate_id; ?>, <?php echo $_SESSION['uzerid']; ?>)"> Vote </button>
                                                
                                            <?php
                                        }
                                        ?>
                                                </td>
                                                </tr>
                            <?php
                        }
                    ?>
                      </tbody>

                       </table>
                        <?php
                    }
    
                 }else {
                    echo "No any active election.";
                 }

            ?>
           
        </div>
    </div>



    <script>
       const CastVote = (electionid, candidateid, votersid) => {
    $.ajax({
        type: "POST",
        url: "inc/ajaxCalls.php",
        data: {
            e_id: electionid,
            c_id: candidateid,
            v_id: votersid
        },
        success: function(response) {
            console.log(response);
            if(response === "Success") {
                location.assign("andx.php?voteCasted=1");
            } else {
                alert("Error: " + response);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error occurred:", status, error);
            alert("An error occurred while casting your vote. Please try again.");
        }
    });
};

    </script>
           		
<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           

<?php
    require_once("inc/footer.php");
?>