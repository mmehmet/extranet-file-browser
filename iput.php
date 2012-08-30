<?php 
 $targetd = $_POST['dctry'] . "/"; 
 $target = $targetd . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
    if (file_exists($target))
      {
      echo "<font color='red'>Sorry, the file <b>". basename( $_FILES['uploaded']['name']) . "</b> already exists YOU GIT.</font>";
      }
    elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
      {
	echo "<font color='green'>The file <b>". basename( $_FILES['uploaded']['name']). "</b> has been uploaded</font>";
	$to = "email@some.place";
	$subject = basename( $_FILES['uploaded']['name']);
      $headers = "From: MM<mic.mehmet@geeksoncallvic.com.au>";
	$file_type = $_FILES['uploaded']['type'];
	$file = fopen($target,'rb');
	$data = fread($file,filesize($target));
	fclose($file);
	 // Generate a boundary string for the email
	$semi_rand = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
	 // Add a multipart boundary above the plain message    
	$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . "invoice attached" . "\n\n";
	 // Base64 encode the file data    
	$data = chunk_split(base64_encode($data));
	 // Add file attachment to the message    
	$message .= "--{$mime_boundary}\n" . "Content-Type: {$file_type};\n" . " name=\"{$subject}\"\n" . "Content-Disposition: attachment;\n" . " filename=\"{$subject}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
	 //send the email
	$ok = @mail($to,$subject,$message,$headers);
	if ($ok) {
		echo "<font color='green'> and it was emailed to some address successfully.</font>"; }
	else {
		die("<font color='red'> but the email could not be sent.</font>"); }
      }
    else {
         echo "<font color='red'>Sorry, there was a problem uploading your file.</font>";
      }
?> 
