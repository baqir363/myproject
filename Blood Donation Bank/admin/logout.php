<?php
    session_start();
    session_destroy();
    session_unset();
?>
<script>
    location.assign("../admn.php");
</script>