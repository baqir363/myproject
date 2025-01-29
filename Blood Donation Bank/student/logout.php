<?php
    session_start();
    session_destroy();
    session_unset();
?>
<script>
    location.assign("stdent.php");
</script>