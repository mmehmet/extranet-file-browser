<?php
$dd = $_GET['Dir'];
echo "Bank records in <b>$dd</b> folder:<br />";
$list = scandir($dd,1);
$i = 0;
$num = count($list);
while($i < $num){
	if($list[$i] != "." && $list[$i] != "..") {
		$item = $dd."/".$list[$i];
		$mod = date("Y-m-d H:i:s.", filemtime($item));
		print "---- <a href=\"$item\">$list[$i]</a> - last modified: ".substr($mod, 0, -1)."<br />";
	}
	$i++;
}
?>
