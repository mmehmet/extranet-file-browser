<?php
$dd = $_GET['Dir'];
echo "Files in <b>$dd</b> folder:<br />";
$list = scandir($dd,1);
$i = 0;
$num = count($list);
print "<a href=\"upload.php\"><img src=\"folder.png\" border=\"0\" /> ..</a><br />";
print "<a href=\"jobsheets.php\"><img src=\"folder.png\" border=\"0\" /> Job Sheets</a><br />";
print "<a href=\"payments.php\"><img src=\"folder.png\" border=\"0\" /> Credit Card Payments</a><br />";
while($i < $num){
	if($list[$i] != "." && $list[$i] != "..") {
		$item = $dd."/".$list[$i];
		$col = $i % 2;
		$mod = date("Y-m-d H:i:s.", filemtime($item));
		print "$col ---- <a href=\"$dd/$list[$i]\">$list[$i]</a> - last modified: ".substr($mod, 0, -1)."<br />";
	}
	$i++;
}
?>

