<?php
require_once("../../admin/enc/konfg.php");

if(isset($_POST['e_id']) && isset($_POST['c_id']) && isset($_POST['v_id'])) {
    $electionId = mysqli_real_escape_string($db, $_POST['e_id']);
    $candidateId = mysqli_real_escape_string($db, $_POST['c_id']);
    $voterId = mysqli_real_escape_string($db, $_POST['v_id']);
    date_default_timezone_set("Asia/karachi");
    $vote_date = date("Y-m-d");
    $vote_time = date("h:i:s a");

    // Insert vote into the 'votings' table
    $insertVote = mysqli_query($db, "INSERT INTO votings(elctionid, votersid, candidateid, votedate, votetime) 
                                     VALUES('$electionId', '$voterId', '$candidateId', '$vote_date', '$vote_time')");

    if($insertVote) {
        // Update candidate's vote count
        $updateVotes = mysqli_query($db, "UPDATE candidatedetails SET noofvotes = noofvotes + 1 WHERE id = '$candidateId'");
        if($updateVotes) {
            echo "Success";
        } else {
            echo "Failed to update votes";
        }
    } else {
        echo "Failed to cast vote";
    }
} else {
    echo "Invalid request";
}
?>
