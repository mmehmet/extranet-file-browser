<?php
$dd = $_GET['Dir'];
echo "Files in <b>$dd</b> folder:<br />";
$list = scandir($dd,1);
$i = 0;
$num = count($list);
print "<a href=\"upload.php\"><img src=\"folder.png\" border=\"0\" /> ..</a><br />";
print "<a href=\"jobsheets.php\"><img src=\"folder.png\" border=\"0\" /> Job Sheets</a><br />";
print "<a href=\"invoices.php\"><img src=\"folder.png\" border=\"0\" /> Invoices</a><br />";
while($i < $num){
   if($list[$i] != "." && $list[$i] != "..") {
        $item = "/home/maniaq/public_html/forms/".$dd."/".$list[$i];
	$mod = date("Y-m-d H:i:s.", filemtime($item));
	print "---- <a href=\"$dd/$list[$i]\">$list[$i]</a> - last modified: ".substr($mod, 0, -1)."<br />";
   }
   $i++;
}
?>

