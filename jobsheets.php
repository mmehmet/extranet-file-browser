<?php
require_once('auth.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mics File Uploading Tool</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
	<script type="text/javascript" src="webtoolkit.aim.js"></script>
	<script type="text/javascript">
		function startCallback() {
			// make something useful before submit (onStart)
			return true;
		}
 
		function completeCallback(response) {
			// make something useful after (onComplete)
			document.getElementById('r').innerHTML = response;
			listit();
		}
function listit()
{
var oRequest;
$ddir = document.getElementById('bla').value;
$dd = "jlist.php?Dir="+$ddir;
try {
        oRequest=new XMLHttpRequest();
     } catch (e)   {
     try {
          oRequest=new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
          try {
              oRequest=new ActiveXObject("Microsoft.XMLHTTP");
               } catch (e) {
                   alert("Your browser does not support AJAX!");
                  return false;
               }
         }
      }
   oRequest.onreadystatechange=function() {
    if(oRequest.readyState==4)
      {
          document.getElementById("nr").innerHTML = oRequest.responseText;
      }
    }
  oRequest.open("GET",$dd,true);
  oRequest.send(null);
  }
</script>
</head>
<body onLoad="listit()">
<div class="acctDiv">
    <table class="t"><tr>
        <td class="acct" width="200">Logged in as <?php echo $_SESSION['GEEK_NAME'];?></td>
        <td class="acct" width="40"><a href="logout.php">logout</a></td>
        <td class="acct" width="160"><a href="pwd.php">change password</a></td>
        <td>&nbsp;</td>
        <td class="acct" width="110"><a href="banking.php"><img src="coin.png" border="0" /> Banking</a></td>
    </tr></table>
</div>
<form enctype="multipart/form-data" action="jput.php" method="post" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback});">
	<label>File:</label> <input type="file" name="uploaded" />
    <input type="hidden" id="bla" name="dctry" value="<?php echo $_SESSION['GEEK_LOGIN'];?>/jobsheets" />
    <input type="hidden" id="bla" name="usern" value="<?php echo $_SESSION['GEEK_NAME'];?>" />
	<input type="submit" value="UPLOAD" />
</form>
<hr />
<div><span id="r"></span></div>
<div id="nr"></div>
</body>
</html>
