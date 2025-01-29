<?php
    require_once("enc/header.php");
    require_once("enc/navigation.php");

    if(isset($_GET['homepage']))
    {
        require_once("enc/homepage.php");

    }else if(isset($_GET['addElectionPage']))
    {
        require_once("enc/add_election.php");

    }else if(isset($_GET['addCandidatePage']))
    {
        require_once("enc/add_candidates.php");

    }else if(isset($_GET['viewResults']))
    {
        require_once("enc/viewResults.php");

    }else if(isset($_GET['editData']))
    {
        require_once("enc/editelection.php");
        
    }else if(isset($_GET['editCandidateData']))
    {
        require_once("enc/editcandidate.php");
    }
?>

<?php
    require_once("enc/footer.php");

?>