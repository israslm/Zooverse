<?php
session_start();
header("Location: //dsagdullin.alwaysdata.net");
session_destroy();
die();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
sessionStorage.removeItem('User');
</script>