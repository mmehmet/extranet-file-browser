<?php
require_once('auth.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-AU" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>GoC Victoria File Uploading Tool</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div class="acctDiv">
	<table class="t"><tr>
		<td class="acct" width="200">Logged in as ADMIN</td>
		<td class="acct" width="40"><a href="logout.php">logout</a></td>
        <td>&nbsp;</td>
	</tr></table>
</div>

<?php
$dd = $_GET['Dir'];
$cwd=getcwd()."/".$dd;
chdir($cwd);
$wd = substr($dd, 6);
$upDir = substr($dd, 0, strripos($dd, '/'));
$list = scandir($cwd,1);
$i = 0;
$num = count($list);
if ($dd == "geeks") {
    echo "Geeks:<br />";
} else {
	echo "Files in <b>" . $wd . "</b> directory:<br />";
	print "<a href=\"adm.php?Dir=geeks\"><img src=\"folder.png\" border=\"0\" /> all geeks</a><br />";
	print "-- <a href=\"adm.php?Dir=$upDir\"><img src=\"folder.png\" border=\"0\" /> ..</a><br />";
}
while($i < $num){
	$item = $list[$i];
	if($item != "." && $item != ".." && $item != "display.xsl" && substr($item, -3) != "png" && substr($item, -3) != "css") {
		if (is_dir($item)) {
			$newd = $dd."/".$item;
			print "-- <a href=\"#\" onClick=\"newdir('$newd');return false;\"><img src=\"folder.png\" border=\"0\" /> $item</a><br />";
		} else {
			$fit = $cwd."/".$list[$i];
			$mod = date("Y-m-d H:i:s.", filemtime($fit));
		    print "---- <a href=\"$dd/$list[$i]\">$list[$i]</a> - last modified: ".substr($mod, 0, -1);
			$isx = substr($fit, -3, 3);
			if ($isx == "xml") {
				$frh     =      fopen($fit,'r');
				$xmldata =      fread($frh,filesize($fit));
				fclose($frh);
		        $c1      =      strpos($xmldata,"<customer_name>")+15;
		        $c2     =       strpos($xmldata,"</customer_name>");
		        $c3     =       substr_replace($xmldata,"",$c2);
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
		        print " - <em>".$cname."</em>";
		    	if($newc == "false") {
					print "<font color=#009900> OH LOOK! REPEAT BUSINESS!</font>";
		    	}
			}
			print "<br />";
		}
	}
	$i++;
}
?>
<script type="text/javascript">
function newdir($newd) {
	location.href="adm.php?Dir="+$newd;
}
</script>
</body>
</html>
