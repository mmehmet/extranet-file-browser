<?php 
   $targetd = $_POST['dctry'] . "/"; 
   chdir($targetd);
   $target = $_POST['bd'].".csv"; 
   $jd = $_POST['jd'];
   $bd = $_POST['bd'];
   $cn = $_POST['cn'];
   $bn = $_POST['bn'];
   $amt = $_POST['amt'];
   $ch = $_POST['chq'];
   if ($ch == "on") {
	$method = "cheque";
   }
   else {$method = "cash";}
   $result = $jd.", ".$bd.", ".$cn.", ".$bn.", ".$amt.", ".$method."\r";
   if (file_exists($target)) {
	$fh = fopen($target,'a') or die("Sorry, there was a problem saving your banking record");
	$ex = "yup";
   }
   else {
	$fh = fopen($target,'w') or die("Sorry, there was a problem saving your banking record");
	fwrite($fh,"Job Date, Banking Date, Customer Name, Business Name, Banking Amount, CSH or CHQ\r");
   }
   fwrite($fh,$result);
   fclose($fh);
   if ($ex = "yup") {
	echo "<font color='green'>The bank record <b>".$target."</b> below was updated</font>";
   }
   else {
	echo "<font color='green'>The bank record has been saved to a CSV file below</font>";
   }
?> 
