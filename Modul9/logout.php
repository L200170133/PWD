<?php
	session_start();
	session_destroy();
?>
<script>
	alert('Anda telah logout');
	document.location='login.php';
</script>