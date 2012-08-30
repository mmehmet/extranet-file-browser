<?php 
 $targetd = $_POST['dctry'] . "/"; 
 $target = $targetd . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
    if (file_exists($target))
      {
      echo "<font color='red'>Sorry, the file <b>". basename( $_FILES['uploaded']['name']) . "</b> already exists.</font>";
      }
    elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
      {
	echo "<font color='green'>The file <b>". basename( $_FILES['uploaded']['name']). "</b> has been uploaded</font>";
      }
    else {
         echo "<font color='red'>Sorry, there was a problem uploading your file.</font>";
      }
?> 
