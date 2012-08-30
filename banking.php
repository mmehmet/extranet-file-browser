<?php
require_once('auth.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mics Banking Tool</title>
	<link rel="stylesheet" type="text/css" href="main.css" />
	<script type="text/javascript" src="webtoolkit.aim.js"></script>
	<SCRIPT LANGUAGE="JavaScript" SRC="CalendarPopup.js"></SCRIPT>
	<script type="text/javascript">
		function startCallback() {
			// make something useful before submit (onStart)
			return true;
		}
 
		function completeCallback(response) {
			// make something useful after (onComplete)
			document.getElementById('r').innerHTML = response;
			listit();
			setTimeout("window.location.reload()",3000);
		}
function listit()
{
var oRequest;
$ddir = document.getElementById('bla').value;
$dd = "blist.php?Dir="+$ddir;
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
<body onLoad="listit();today();">
<div class="acctDiv">
    <table class="t"><tr>
        <td class="acct" width="200">Logged in as <?php echo $_SESSION['GEEK_NAME'];?></td>
        <td class="acct" width="40"><a href="logout.php">logout</a></td>
        <td class="acct" width="160"><a href="pwd.php">change password</a></td>
        <td>&nbsp;</td>
        <td class="acct" width="150"><a href="upload.php"><img src="up.png" border="0" /> Upload Files</a></td>
    </tr></table>
</div>
<form name="bank" action="addrec.php" method="post" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback});">
	<table><tr>
                <td><label>Customer Name:</label> <input type="text" name="cn" /></td>
                <td><label>Business Name:</label> <input type="text" name="bn" /></td>
                </tr><tr>
		<td><label>Job Date:</label> <input type="text" name="jd" /> <a href="#" onClick="cal.select(document.bank.jd,'anchor1','yyyy-MM-dd'); return false;" name="anchor1" id="anchor1"><img border="0" src="cal.gif"></a></td>
		<td><label>Bank Date:</label> <input type="text" name="bd" /> <a href="#" onClick="cal.select(document.bank.bd,'anchor2','yyyy-MM-dd'); return false;" name="anchor2" id="anchor2"><img border="0" src="cal.gif"></a></td>
		</tr><tr>
		<td><label>Amount:</label> <input type="text" name="amt" value="$" /></td>
		<td><label>Cash</label> <input type="radio" name="csh" onClick="chqtog()" />
			<label>Cheque</label> <input type="radio" name="chq" onClick="cshtog()" /></td></tr>
	</table>
	<input type="submit" value="ADD RECORD" onClick="return checkit();" />
	<div><input type="hidden" id="bla" name="dctry" value="<?php echo $_SESSION['GEEK_LOGIN'];?>/banking" /></div>
</form>
<hr/>
<div><span id="r"></span></div>
<div id="nr"></div>
<script type="text/javascript">
var cal = new CalendarPopup();
var d=new Date();
var themonth=d.getMonth()+1
if (themonth<10)
	themonth="0"+themonth
var theday=d.getDate()
if (theday<10)
	theday="0"+theday
var TODAY = d.getFullYear() + "-" + themonth + "-" + theday;
function today(){
	document.bank.bd.value = TODAY;
}
	function chqtog() {
		document.bank.chq.checked=false;
	}
	function cshtog() {
		document.bank.csh.checked=false;
	}
        function checkit() {
		if (document.bank.jd.value == "") {
			alert ("Please enter a Job Date");
			document.bank.jd.focus();
			return false;
		}
		if (document.bank.cn.value == "") {
			alert ("Please enter a name for the Customer");
			document.bank.cn.focus();
			return false;
		}
		if (document.bank.amt.value.length < 2) {
			alert ("How much from this Customer?");
			document.bank.amt.focus();
			return false;
		}
		if (document.bank.csh.checked == false && document.bank.chq.checked == false) {
			alert ("Cash or Cheque?");
			return false;
		}
		return true;
	}
</script>
</body>
</html>
