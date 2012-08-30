<?php
$dd = $_GET['Dir'];
echo "Files in <b>$dd</b> folder:<br />";
$list = scandir($dd);
$i = 0;
$num = count($list);
print "<a href=\"jobsheets.php\"><img src=\"folder.png\" border=\"0\" /> Job Sheets</a><br />";
print "<a href=\"invoices.php\"><img src=\"folder.png\" border=\"0\" /> Invoices</a><br />";
print "<a href=\"payments.php\"><img src=\"folder.png\" border=\"0\" /> Credit Card Payments</a><br />";
while($i < $num){
	if($list[$i] != "." && $list[$i] != ".." && $list[$i] != "banking" && $list[$i] != "jobsheets" && $list[$i] != "invoices" && $list[$i] != "payments") {
		$item = $dd."/".$list[$i];
		$mod = date("Y-m-d H:i:s.", filemtime($item));
		print "---- <a href=\"$dd/$list[$i]\">$list[$i]</a> - last modified: ".substr($mod, 0, -1)."<br />";
   }
   $i++;
}
?>

