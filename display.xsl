<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="job_sheet_page">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../js.css" title="Style" />
</head>
<div id="ctl"><input class="btn" type="button" value="X" onclick="history.back()" /></div>
<body>
<div class="segment"><table>
	<tr>
		<td class="topbox"><xsl:value-of select="customer_name" /></td>
		<td class="topbox"><xsl:value-of select="site_address" /></td>
		<td class="topbox"><xsl:value-of select="site_address_suburb" /></td>
		<td class="topbox"><xsl:value-of select="phone_number_1" /></td>
	</tr>
  </table>
  <table>
	<tr>
		<td rowspan="2">&#160;</td>
		<td rowspan="2" class="logo"> </td>
		<td align="center">Geeks On Call - Melbourne SE</td>
	</tr>
	<tr>
		<td align="center">Job Sheet</td>
	</tr>
  </table>
  <table>
	<tr>
		<td>Geek:</td>
		<td class="box"><xsl:value-of select="geek_number" /></td>
		<td>Hourly Rate:</td>
		<td class="box">&#36;<xsl:value-of select="hourly_rate" /></td>
		<td>Billable Hours:</td>
		<td class="box"><xsl:value-of select="total_billable_hours" /></td>
	</tr>
  </table>
  <h4>Job Info:</h4>
  <table>
	<tr>
		<td class="ttl" width="50%">Date:</td>
		<td class="ttl">Job No.</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="job_date" /></td>
		<td class="box"><xsl:value-of select="job_number" /></td>
	</tr>
	<tr>
		<td class="ttl">Time in:</td>
		<td class="ttl">Time Out:</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="time_in" /></td>
		<td class="box"><xsl:value-of select="time_out" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><xsl:choose>
			<xsl:when test="workshop_time = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Plus Workshop Time</td>
	</tr>
  </table>
  <h4>Customer Details</h4>
  <table>
	<tr>
		<td class="ttl" width="50%">Business Name:</td>
		<td colspan="2" class="ttl">Customer Name:</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="business_name" /></td>
		<td class="box" colspan="2"><xsl:value-of select="customer_name" /></td>
	</tr>
	<tr>
		<td class="ttl">E-mail Address:</td>
		<td colspan="2" class="ttl">Phone Number 1</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="email_address" /></td>
		<td class="box" colspan="2"><xsl:value-of select="phone_number_1" /></td>
	</tr>
	<tr>
		<td class="ttl">Referred From:</td>
		<td colspan="2" class="ttl">Phone Number 2</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="referred_from" /></td>
		<td class="box" colspan="2"><xsl:value-of select="phone_number_2" /></td>
	</tr>
	<tr>
		<td class="ttl">Site Address:</td>
		<td class="ttl">Suburb:</td>
		<td class="ttl">P/Code:</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="site_address" /></td>
		<td class="box"><xsl:value-of select="site_address_suburb" /></td>
		<td class="box"><xsl:value-of select="site_postcode" /></td>
	</tr>
	<tr>
		<td colspan="2" class="ttl">Postal Address (If Different):</td>
		<td class="ttl">P/Code:</td>
	</tr>
	<tr>
		<td class="box" colspan="2"><xsl:value-of select="postal_address" />&#160;</td>
		<td class="box"><xsl:value-of select="postal_address_postcode" /></td>
	</tr>
  </table>
  <table>
	<tr>
		<td width="50%"><h4 style="margin-left:0px">Send Invoice by:</h4></td>
		<td><h4 style="margin-left:0px">New Customer?</h4></td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="send_invoice_email = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Email <xsl:choose>
			<xsl:when test="send_invoice_fax = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Fax <xsl:choose>
			<xsl:when test="send_invoice_post = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Post
		</td><td><xsl:choose>
			<xsl:when test="new_customer = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Yes <xsl:choose>
			<xsl:when test="new_customer = 'false'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> No - Update Details 
			<xsl:if test="new_customer = 'false'"><xsl:choose>
				<xsl:when test="new_customer_update_details = 'true'"><font color="green">&#9745;</font>
				</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
				</xsl:otherwise></xsl:choose>
			</xsl:if></td>
	</tr>
  </table>
  <h4>Job Details:</h4>
  <table>
	<tr>
		<td width="50%"><xsl:choose>
			<xsl:when test="troubleshoot_non_booting_machine = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Troubleshoot non-booting machine</td>
		<td><xsl:choose>
			<xsl:when test="troubleshoot_internet_connection = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Troubleshoot internet connection</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="data_backup = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Data backup</td>
		<td><xsl:choose>
			<xsl:when test="configure_adsl_hardware = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Configure ADSL hardware</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="operating_system = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Install / Reinstall of Operating System</td>
		<td><xsl:choose>
			<xsl:when test="setup_wireless_network = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Setup Wireless Network</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="install_microsoft_office = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Install / Setup Office</td>
		<td><xsl:choose>
			<xsl:when test="diagnose_hardware_fault = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Diagnose hardware fault</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="install_software = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Install Software</td>
		<td><xsl:choose>
			<xsl:when test="install_supplied_hardware = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Install Supplied Hardware</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="download_install_drivers = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Download / Install Drivers</td>
		<td><xsl:choose>
			<xsl:when test="virus_malware_removal = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Virus / Malware Support</td>
	</tr>
	<tr>
		<td><xsl:choose>
			<xsl:when test="install_printer = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Install Printer</td>
		<td><xsl:choose>
			<xsl:when test="workstation_deployment = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose> Workstation Setup</td>
	</tr>
  </table>
  <h4>Further Details:</h4>
</div>
<div id="bigbox"><xsl:value-of select="further_details" /></div>
<div class="segment"><h4>Hardware Supplied:</h4>
  <table>
	<tr>
		<td class="ttl" width="50">Qty:</td>
		<td class="ttl">Description:</td>
		<td class="ttl" align="center">Crate:</td>
		<td class="ttl" align="center">Ordered:</td>
		<td class="ttl">Price inc GST:</td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="qty_1" /></td>
		<td class="box" width="50%"><xsl:value-of select="description_1" /></td>
		<td align="center"><xsl:choose>
			<xsl:when test="crate_1 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td align="center"><xsl:choose>
			<xsl:when test="ordered_1 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td class="box" width="150"><xsl:value-of select="price_1" /></td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="qty_2" /></td>
		<td class="box"><xsl:value-of select="description_2" /></td>
		<td align="center"><xsl:choose>
			<xsl:when test="crate_2 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td align="center"><xsl:choose>
			<xsl:when test="ordered_2 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td class="box"><xsl:value-of select="price_2" /></td>
	</tr>
	<tr>
		<td class="box"><xsl:value-of select="qty_3" /></td>
		<td class="box"><xsl:value-of select="description_3" /></td>
		<td align="center"><xsl:choose>
			<xsl:when test="crate_3 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td align="center"><xsl:choose>
			<xsl:when test="ordered_3 = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose></td>
		<td class="box"><xsl:value-of select="price_3" /></td>
	</tr>
  </table>
  <table>
	<tr>
		<td width="20"><xsl:choose>
		<xsl:when test="job_complete = 'true'"><font color="green">&#9745;</font></xsl:when>
		<xsl:otherwise><font color="#990000">&#9744;</font></xsl:otherwise>
		</xsl:choose></td>
		<td class="ttl">Job Complete?</td>
		<td  width="20"><xsl:choose>
			<xsl:when test="follow_up = 'true'"><font color="green">&#9745;</font></xsl:when>
			<xsl:otherwise><font color="#990000">&#9744;</font></xsl:otherwise>
			</xsl:choose></td>
		<td class="ttl">Follow up Required?</td>
		<td class="ttl" align="right">If YES when?</td>
		<td class="box" width="200"><xsl:value-of select="follow_up_when" />&#160;</td>
	</tr>
  </table>
  <h4>Total Amount Payable:</h4>
  <table>
	<tr>
		<td class="ttl">Hourly Rate (incl. GST):</td>
		<td class="box">&#36;<xsl:value-of select="hourly_rate" /></td>
		<td>&#160;</td>
		<td class="ttl">Total Billable Hours:</td>
		<td class="box"><xsl:value-of select="total_billable_hours" /></td>
		<td>&#160;</td>
		<td class="ttl" align="right">Labour (incl. GST):</td>
		<td class="box" width="150">&#36;<xsl:value-of select="labour" /></td>
	</tr>
	<tr>
		<td class="ttl" colspan="7" align="right">Hardware (incl. GST):</td>
		<td class="box">&#36;<xsl:value-of select="hardware" /></td>
	</tr>
	<tr>
		<td colspan="7" style="text-decoration:underline;text-align:right;">Grand Total (incl. GST):</td>
		<td class="box" style="text-decoration:underline">&#36;<xsl:value-of select="total" /></td>
	</tr>
  </table>
  <table>
	<tr>
		<td width="20"><xsl:choose>
			<xsl:when test="payment_received = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Yes</td>
		<td width="20"><xsl:choose>
			<xsl:when test="payment_received = 'false'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>No</td>
		<td class="ttl">Payment Received?</td>
		<td class="ttl" align="right">Send Receipt?</td>
		<td width="20"><xsl:choose>
			<xsl:when test="send_receipt = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Yes</td>
		<td width="20"><xsl:choose>
			<xsl:when test="send_receipt = 'false'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>No</td>
	</tr>
  </table>
  <h4>Payment By:</h4>
  <table>
	<tr>
		<td><xsl:choose>
			<xsl:when test="payment_by_cash = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Cash</td>
		<td><xsl:choose>
			<xsl:when test="payment_by_chq = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Cheque</td>
		<td colspan="2" align="center"><xsl:choose>
			<xsl:when test="payment_by_cc = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Credit Card <font size="-4">(refer payment slip)</font></td>
		<td align="right"><xsl:choose>
			<xsl:when test="payment_by_dd = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Direct Debit</td>
		<td align="right"><xsl:choose>
			<xsl:when test="payment_by_account = 'true'"><font color="green">&#9745;</font>
			</xsl:when><xsl:otherwise><font color="#990000">&#9744;</font>
			</xsl:otherwise></xsl:choose>Account</td>
	</tr>
	<tr>
		<td>Cheque Name: </td>
		<td colspan="4" class="box"><xsl:value-of select="chq_name" />&#160;</td>
	</tr>
  </table>
</div>
<h1>&#160;</h1>
<h1>&#160;</h1>
<h1>&#160;</h1>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
