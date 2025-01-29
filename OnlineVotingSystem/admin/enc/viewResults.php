<?php
    $electionid = $_GET['viewResults'];
?>

<div class="row my-3">
        <div class="col-12">
            <h3> Election Results </h3>


            <?php

                $fetchingActiveElection = mysqli_query($db,"SELECT * FROM elections WHERE id = '".$electionid."'") or die(mysqli_error($db));
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
                        <th>Votes</th>
                        <th>Competition</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fetchingCandidates = mysqli_query($db,"SELECT * FROM candidatedetails WHERE numberid = '". $electionid."'") or die(mysqli_error($db));

                        // Array to hold candidates votes
                        $candidateVotes = [];

                        while( $candidateData = mysqli_fetch_assoc($fetchingCandidates))
                        {   
                            $candidate_id = $candidateData['id'];
                            $candidate_photo = $candidateData['candidatephoto'];
                            $noofvotes = $candidateData['noofvotes'];
                            // Fetching Candidate Votes
                            // $fetchingVotes = mysqli_query($db,"SELECT * FROM votings WHERE candidateid = '".$candidate_id."'") or die(mysqli_error($db));
                            // $totalVotes = mysqli_num_rows($fetchingVotes);
                            $candidateVotes[$candidate_id] = $noofvotes; // Store votes in array  
                        }
                                // $maxVotes = max($candidateVotes);  
                                // $ties = array_keys($candidateVotes, $maxVotes);

                                 // Loop again to display results with competition status
                            $fetchingCandidates = mysqli_query($db, "SELECT * FROM candidatedetails WHERE numberid = '". $electionid ."'") or die(mysqli_error($db));

                            while ($candidateData = mysqli_fetch_assoc($fetchingCandidates)) {
                                $candidate_id = $candidateData['id'];
                                $candidate_photo = $candidateData['candidatephoto'];
                                $noofvotes = $candidateData['noofvotes'];
                              
                                ?>
                                <tr>
                                    <td> <img src="<?php echo $candidate_photo;  ?>" class="candidate_photo"></td>
                                    <td> <?php echo "<b>". $candidateData['candidatename'] . "</b><br />".  $candidateData['candidatedetailed']; ?></td>
                                    <td> <?php echo $noofvotes; ?></td>
                                    <?php
                                     
?>                                      
                                    <td>
                                    <?php
                                       // Determine if the candidate is a winner, loser, or tie
    // Fetch the number of votes from the database for this candidate
    $votes = $candidateData['noofvotes'];

    // Initialize an array to store all candidates' votes (if not done earlier)
    if (!isset($candidateVotes)) {
        $candidateVotes = []; // Make sure this is initialized as an associative array
    }

    // Store the current candidate's votes in the array
    $candidateVotes[$candidateData['id']] = $votes;

    // Check the number of votes for each candidate
    if ($votes == 0) {
        echo "No votes cast";
    } else if ($votes == 1) {
        echo "One vote cast";
    } else {
        // Ensure that $candidateVotes contains data before using max()
        if (!empty($candidateVotes)) {
            $maxVotes = max($candidateVotes); // Get the max number of votes

            $ties = array_keys($candidateVotes, $maxVotes); // Find all candidates with the max votes

            if (count($ties) == count($candidateVotes)) {
                // If all candidates have the same number of votes
                echo "It's a tie";
            } else if ($votes == $maxVotes) {
                // This candidate has the maximum number of votes
                echo "Winner";
            } else {
                // This candidate has fewer votes than the winner(s)
                echo "Loser";
            }
        } else {
            echo "Error: No votes data available"; // Fallback in case of no votes
        }
    }
                                    
                                      ?>
                                   </td>
                                   <?php
                                ?>
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
                 <hr>
                 <h3>Voting Details</h3>
                    <?php
                        $fetchingVoteDetails = mysqli_query($db,"SELECT * FROM votings WHERE elctionid = '".$electionid."'");
                        $number_of_votes = mysqli_num_rows($fetchingVoteDetails);

                        if($number_of_votes > 0)
                        {
                                $sno = 1;
                                ?>
                                      <table class="table">
                    <tr>
                    <th>S.No</th>
                    <th>Voter Name</th>
                    <th>Contact No</th>
                    <th>Voted To</th>
                    <th>Date</th>
                    <th>Time</th>
                    </tr>
                                <?php
                                while($data = mysqli_fetch_assoc($fetchingVoteDetails))
                                {
                                    $voters_id = $data['votersid'];
                                    $candidate_id = $data['candidateid'];
                                    $fetchingUsername = mysqli_query($db,"SELECT * FROM users WHERE id = '".$voters_id."'") or die(mysqli_error($db));
                                    $isDataAvailable = mysqli_num_rows($fetchingUsername);
                                    $userData = mysqli_fetch_assoc($fetchingUsername);
                                    if($isDataAvailable > 0)
                                    {
                                        $username = $userData['username'];
                                        $contact_no = $userData['contactno'];
                                    }else {
                                        $username = "NO_Data";
                                        $contact_no = $userData['contactno'];
                                    }
                                    $fetchingCandidateName = mysqli_query($db,"SELECT * FROM candidatedetails WHERE id = '".$candidate_id."'") or die(mysqli_error($db));
                                    $isDataAvailable = mysqli_num_rows($fetchingCandidateName);
                                    $candidateData = mysqli_fetch_assoc($fetchingCandidateName);
                                    if($isDataAvailable > 0)
                                    {
                                        $candidate_name = $candidateData['candidatename'];
                                       
                                    }else {
                                      
                                        $candidate_name = "NO_Data";
                                    }
                                    ?>
                                        <tr>
                                            <td> <?php echo $sno++; ?></td>
                                            <td> <?php echo $username; ?></td>
                                            <td> <?php echo $contact_no; ?></td>
                                            <td> <?php echo $candidate_name; ?></td>
                                            <td> <?php echo $data['votedate']; ?></td>
                                            <td> <?php echo $data['votetime']; ?></td>
                                        </tr>
                                    <?php
                                }
                                echo "</table>";
                        }else {
                            echo "No any vote detail is available!";

                        }
                    ?>
                 </table>
        </div>
    </div>
