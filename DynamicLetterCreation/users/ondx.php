<?php 
    require_once("inc/hdr.php");

    require_once("inc/navigation.php");
    
    if(isset($_GET['home']))
    {
        require_once("inc/home.php");
    }else if(isset($_GET['composeletter']))
    {
        require_once("inc/composeletter.php");
     
    }else if(isset($_GET['letterhistory']))
    {
        require_once("inc/history.php");
    }
   
?>    
<?php
    require_once("inc/footer.php");
?>
