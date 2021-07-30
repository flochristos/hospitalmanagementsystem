<?php 
session_start();
 //removes all session
 session_unset();
 
 //destroys all session
 session_destroy();
 
 ?>
 <body onload="ff()">
 	
 </body>
 <script type="text/javascript">
 	function ff() {
 		window.location.assign("login.php")
 	}
 </script>