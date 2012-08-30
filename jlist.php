<?php
$dd = $_GET['Dir'];
echo "Files in <b>$dd</b> folder:<br />";
$list = scandir($dd,1);
$i = 0;
$num = count($list);
print "<a href=\"upload.php\"><img src=\"folder.png\" border=\"0\" /> ..</a><br />";
print "<a href=\"invoices.php\"><img src=\"folder.png\" border=\"0\" /> Invoices</a><br />";
print "<a href=\"payments.php\"><img src=\"folder.png\" border=\"0\" /> Credit Card Payments</a><br />";
while($i < $num){
	if($list[$i] != "." && $list[$i] != ".." && $list[$i] != "display.xsl") {
		$item = $dd."/".$list[$i];
		$frh	 =	fopen($item,'r');
		$xmldata =	fread($frh,filesize($item));
		fclose($frh);
		$c1	 =	strpos($xmldata,"<customer_name>")+15;
		$c2	=	strpos($xmldata,"</customer_name>");
		$c3	=	substr_replace($xmldata,"",$c2);
		$cname  =       substr_replace($c3,"",0,$c1);
		$bn1      =      strpos($xmldata,"<business_name>")+15;
		$bn2     =       strpos($xmldata,"</business_name>");
		$bn3     =       substr_replace($xmldata,"",$bn2);
		$bname  =       substr_replace($bn3,"",0,$bn1);
		if($bname != "") {
			$cname = $bname;
		}
		$nc1	=	strpos($xmldata,"<new_customer>")+14;
		$nc2	=	strpos($xmldata,"</new_customer>");
		$nc3	=	substr_replace($xmldata,"",$nc2);
		$newc	=	substr_replace($nc3,"",0,$nc1);
		$cr11	=	strpos($xmldata,"<crate_1>")+9;
		$cr12	=	strpos($xmldata,"</crate_1>");
		$cr13	=	substr_replace($xmldata,"",$cr12);
		$cr21   =       strpos($xmldata,"<crate_2>")+9;
		$cr22   =       strpos($xmldata,"</crate_2>");
		$cr23   =       substr_replace($xmldata,"",$cr22);
		$cr31   =       strpos($xmldata,"<crate_3>")+9;
		$cr32   =       strpos($xmldata,"</crate_3>");
		$cr33   =       substr_replace($xmldata,"",$cr32);
		$cr1	=	substr_replace($cr13,"",0,$cr11);
		$cr2    =       substr_replace($cr23,"",0,$cr21);
		$cr3    =       substr_replace($cr33,"",0,$cr31);
		$mod = date("Y-m-d H:i:s.", filemtime($item));
		print "---- <a href=\"$dd/$list[$i]\">$list[$i]</a> - last modified: ".substr($mod, 0, -1)." - <em>".$cname."</em>";
		if($newc == "false") {
			print "<font color=#009900> REPEAT BUSINESS!</font>";
		}
		if (($cr1 == "true") || ($cr2 == "true") || ($cr3 == "true")) {
			print "<font color=#990000> - CRATE</font>";
		} 
		print "<br />";
	}
	$i++;
}
?>

