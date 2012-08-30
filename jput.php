<?php 
$targetd = $_POST['dctry'] . "/";
$target = $targetd . basename( $_FILES['uploaded']['name']) ;
$from = $_POST['usern'];
	if (file_exists($target)) {
		echo "<font color='red'>Sorry, the file <b>". basename( $_FILES['uploaded']['name']) . "</b> already exists...</font>";
	} elseif (substr(basename( $_FILES['uploaded']['name']), -3) != 'xml') {
		echo "<font color='red'>Sorry, but <b>". basename( $_FILES['uploaded']['name']) . "</b> doesn't appear to be an xml file...</font>";
	} elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
	echo "<font color='green'>The file <b>". basename( $_FILES['uploaded']['name']). "</b> has been uploaded</font>";
	$to = "email@some.place.else";
	$subject = basename( $_FILES['uploaded']['name']);
      $headers = "From: MM<mic.mehmet@geeksoncallvic.com.au>";
	$file_type = $_FILES['uploaded']['type'];
	$file = fopen($target,'rb');
	$data = fread($file,filesize($target));
	fclose($file);
	include 'format.php';
	 // Generate a boundary string for the email
	$semi_rand = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
	 // Add a multipart boundary above the plain message    
	$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . "\n";
	$message .= "--{$mime_boundary}\n"."Content-Type: text/html; charset=\"iso-8859-1\"\n"."Content-Transfer-Encoding: 7bit\n"."MIME-Version: 1.0\n\n";
	ob_start(); //Turn on output buffering
?>
<html>
<head>
<title><?php echo $subject; ?></title>
</head>
<body style="{color:black; background:white; font-family:"Arial",sans-serif;}">
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td rowspan="3" align="left" width="100"><img src="http://shrunklink.com/csja" width="100" height="91" alt="logo"/></td>
		<td align="center">Geeks On Call - Melbourne SE</td>
	</tr>
	<tr>
		<td colspan="2" align="center">Job Sheet</td>
	</tr>
	<tr>
		<td align="right">Geek:</td>
		<td style="background: #ffffe3"><?php echo $gn; ?></td>
	</tr>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td colspan="2"><strong><u>Job Info</u></strong></td>
	</tr>
	<tr>
		<td>Date:</td>
		<td>Job No.</td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $jd; ?></td>
		<td style="background: #ffffe3"><?php echo $jn; ?></td>
	</tr>
	<tr>
		<td>Time in:</td>
		<td>Time Out:</td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $tin; ?></td>
		<td style="background: #ffffe3"><?php echo $tout; ?></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><?php echo $wtv; ?> Plus Workshop Time</td>
	</tr>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td colspan="3"><strong><u>Customer Details</u></strong></td>
	</tr>
	<tr>
		<td width="50%">Business Name:</td>
		<td colspan="2">Customer Name:</td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $bn; ?></td>
		<td style="background: #ffffe3" colspan="2"><?php echo $cn; ?></td>
	</tr>
	<tr>
		<td>E-mail Address:</td>
		<td colspan="2">Phone Number 1</td>
	</tr>
	<tr>
                <td style="background: #ffffe3"><?php echo $em; ?></td>
                <td style="background: #ffffe3" colspan="2"><?php echo $pph; ?></td>
	<tr>
		<td>Referred From:</td>
		<td colspan="2">Phone Number 2</td>
	</tr>
	<tr>
                <td style="background: #ffffe3"><?php echo $ref; ?></td>
                <td style="background: #ffffe3" colspan="2"><?php echo $sph; ?></td>
	</tr>
	<tr>
		<td>Site Address:</td>
		<td>Suburb:</td>
		<td>Post Code:</td>
	</tr>
	<tr>
                <td style="background: #ffffe3"><?php echo $sad; ?></td>
                <td style="background: #ffffe3"><?php echo $ssub; ?></td>
                <td style="background: #ffffe3"><?php echo $spc; ?></td>
	</tr>
	<tr>
		<td colspan="2">Postal Address (If Different):</td>
		<td>Post Code:</td>
	</tr>
	<tr>
		<td style="background: #ffffe3" colspan="2"><?php echo $pad; ?></td>
		<td style="background: #ffffe3"><?php echo $ppc; ?> </td>
	</tr>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td align="left"><strong><u>Send Invoice by:</u></strong></td>
		<td align="left"><strong><u>New Customer?</u></strong></td>
	</tr>
	<tr>
		<td><?php echo $sib; ?></td>
		<td><?php echo $ncd; ?></td>
	</tr>
	<tr>
		<td colspan="2"><strong><u>Job Details:</u></strong></td>
	</tr>
	<tr>
		<td><?php echo $nbm; ?> Troubleshoot non-booting machine</td>
                <td><?php echo $int; ?> Troubleshoot internet connection</td>
	</tr>
        <tr>
                <td><?php echo $dbu; ?> Data Back-Up</td>
                <td><?php echo $adsl; ?> Configure ADSL Hardware</td>
        </tr>
        <tr>
                <td><?php echo $os; ?> Install / Reinstall Operating System</td>
                <td><?php echo $wifi; ?> Setup Wireless Network</td>
        </tr>
        <tr>
                <td><?php echo $ofc; ?> Install / Setup Office</td>
                <td><?php echo $hwf; ?> Diagnose Hardware Fault</td>
        </tr>
        <tr>
                <td><?php echo $isw; ?> Install Software</td>
                <td><?php echo $ihw; ?> Install Supplied Hardware</td>
        </tr>
        <tr>
                <td><?php echo $drv; ?> Download / Install Drivers</td>
                <td><?php echo $mal; ?> Deal with Virus / Malware</td>
        </tr>
        <tr>
                <td><?php echo $prt; ?> Install Printer</td>
                <td><?php echo $new; ?> Workstation Deployment</td>
        </tr><tr>
		<td colspan="2"><strong><u>Further Details:</u></strong></td>
	</tr><tr style="MIN-HEIGHT: 200px">
		<td colspan="2" style="background: #ffffe3"><?php echo $det; ?></td>
	</tr>
</table>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td colspan="5"><strong><u>Hardware Supplied:</u></strong></td>
	</tr>
	<tr>
		<td>Qty:</td>
		<td>Description:</td>
		<td>Crate:</td>
		<td>Ordered:</td>
		<td>Price inc GST:</td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $pqty; ?></td>
		<td style="background: #ffffe3"><?php echo $pdsc; ?></td>
		<td><?php echo $pcrt; ?></td>
		<td><?php echo $pord; ?></td>
		<td style="background: #ffffe3"><?php echo $pprc; ?></td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $sqty; ?></td>
		<td style="background: #ffffe3"><?php echo $sdsc; ?></td>
		<td><?php echo $scrt; ?></td>
		<td><?php echo $sord; ?></td>
		<td style="background: #ffffe3"><?php echo $sprc; ?></td>
	</tr>
	<tr>
		<td style="background: #ffffe3"><?php echo $tqty; ?></td>
		<td style="background: #ffffe3"><?php echo $tdsc; ?></td>
		<td><?php echo $tcrt; ?></td>
		<td><?php echo $tord; ?></td>
		<td style="background: #ffffe3"><?php echo $tprc; ?></td>
	</tr>
	<tr>
		<td colspan="2"><strong><u>Job Complete?</u></strong></td>
		<td colspan="2"><strong><u>Follow up Required?</u></strong></td>
		<td><strong><u>If YES when?</u></strong></td>
	</tr>
	<tr>
		<td><?php echo $jbc; ?></td>
		<td><?php echo $fup; ?></td>
		<td style="background: #ffffe3"><?php echo $fuw; ?></td>
	</tr>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td colspan="6"><strong><u>Total Amount Payable:</u> </strong> (All prices are GST inclusive)</td>
	</tr>
	<tr>
		<td>Hourly Rate:</td>
		<td style="background: #ffffe3">$<?php echo $rate; ?></td>
		<td>Total Billable Hours:</td>
		<td style="background: #ffffe3"><?php echo $tbh; ?></td>
		<td>Labour:</td>
		<td style="background: #ffffe3">$<?php echo $lbr; ?></td>
	</tr>
	<tr>
		<td colspan="4"> </td>
		<td>Hardware:</td>
		<td style="background: #ffffe3">$<?php echo $hwt; ?></td>
	</tr>
	<tr>
		<td colspan="4"> </td>
		<td><strong><u>Grand Total:</u></strong></td>
		<td style="background: #ffffe3"><strong><u>$<?php echo $total; ?></u></strong></td>
	</tr>
	<tr>
		<td align="left" colspan="2"><strong><u>Payment Received?</u></strong></td>
		<td><?php echo $prec; ?></td>
		<td align="left" colspan="2"><strong><u>Send Receipt?</u></strong></td>
		<td><?php echo $send; ?></td>
	</tr>
</table>
<table width="100%" style="background: #f4f4f4">
	<tr>
		<td colspan="5"><strong><u>Payment By:</u></strong></td>
	</tr>
	<tr>
		<td><?php echo $csh; ?> Cash</td>
		<td><?php echo $chq; ?> Cheque</td>
		<td><?php echo $crd; ?> Credit Card <font size="-4">(see payments section)</font></td>
		<td><?php echo $eft; ?> Direct Debit</td>
		<td><?php echo $inv; ?> Account</td>

	</tr>

	<?php echo $chqnam; ?>

</table>
</body>
</html>


<?php
	 //append buffer contents to $message variable and delete current output buffer
	$message .= ob_get_clean();
	 // Base64 encode the file data    
	$data = chunk_split(base64_encode($data));
	 // Add file attachment to the message    
	$message .= "--{$mime_boundary}\n" . "Content-Type: {$file_type};\n" . " name=\"{$subject}\"\n" . "Content-Disposition: attachment;\n" . " filename=\"{$subject}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
	 //send the email
	$ok = @mail($to,$subject,$message,$headers);
	if ($ok) {
		echo "<font color='green'> and it was (not) emailed to $to successfully.</font>"; }
	else {
		die("<font color='red'> but the email could not be sent.</font>"); }
      }
    else {
         echo "<font color='red'>Sorry, there was a problem uploading your file.</font>";
      }
?> 
