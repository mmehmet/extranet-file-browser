<?php

$gn1 = strpos($data,"<geek_number>")+13;
$gn2 = strpos($data,"</geek_number>");
$gn3 = substr_replace($data,"",$gn2);
$gn = substr_replace($gn3,"",0,$gn1);
$hr1 = strpos($data,"<hourly_rate>")+13;
$hr2 = strpos($data,"</hourly_rate>");
$hr3 = substr_replace($data,"",$hr2);
$rate = substr_replace($hr3,"",0,$hr1);
$tbh1 = strpos($data,"<total_billable_hours>")+22;
$tbh2 = strpos($data,"</total_billable_hours>");
$tbh3 = substr_replace($data,"",$tbh2);
$tbh = substr_replace($tbh3,"",0,$tbh1);
$jd1 = strpos($data,"<job_date>")+10;
$jd2 = strpos($data,"</job_date>");
$jd3 = substr_replace($data,"",$jd2);
$jd = substr_replace($jd3,"",0,$jd1);
$jn1 = strpos($data,"<job_number>")+12;
$jn2 = strpos($data,"</job_number>");
$jn3 = substr_replace($data,"",$jn2);
$jn = substr_replace($jn3,"",0,$jn1);
$tin1 = strpos($data,"<time_in>")+9;
$tin2 = strpos($data,"</time_in>");
$tin3 = substr_replace($data,"",$tin2);
$tin = substr_replace($tin3,"",0,$tin1);
$tout1 = strpos($data,"<time_out>")+10;
$tout2 = strpos($data,"</time_out>");
$tout3 = substr_replace($data,"",$tout2);
$tout = substr_replace($tout3,"",0,$tout1);
$wtt = substr($data,strpos($data,"<workshop_time>")+15,1);
if ($wtt == "t") {$wtv = "<font color=\"green\">&#9745;</font>";}
else {$wtv = "<font color=\"#990000\">&#9744;</font>";}
$bn1 = strpos($data,"<business_name>")+15;
$bn2 = strpos($data,"</business_name>");
$bn3 = substr_replace($data,"",$bn2);
$bn = substr_replace($bn3,"",0,$bn1);
$cn1 = strpos($data,"<customer_name>")+15;
$cn2 = strpos($data,"</customer_name>");
$cn = substr($data,$cn1,$cn2-$cn1);
$em1 = strpos($data,"<email_address>")+15;
$em2 = strpos($data,"</email_address>");
$em3 = substr_replace($data,"",$em2);
$em = substr_replace($em3,"",0,$em1);
$pph1 = strpos($data,"<phone_number_1>")+16;
$pph2 = strpos($data,"</phone_number_1>");
$pph3 = substr_replace($data,"",$pph2);
$pph = substr_replace($pph3,"",0,$pph1);
$ref1 = strpos($data,"<referred_from>")+15;
$ref2 = strpos($data,"</referred_from>");
$ref3 = substr_replace($data,"",$ref2);
$ref = substr_replace($ref3,"",0,$ref1);
$sph1 = strpos($data,"<phone_number_2>")+16;
$sph2 = strpos($data,"</phone_number_2>");
$sph3 = substr_replace($data,"",$sph2);
$sph = substr_replace($sph3,"",0,$sph1);
$sad1 = strpos($data,"<site_address>")+14;
$sad2 = strpos($data,"</site_address>");
$sad3 = substr_replace($data,"",$sad2);
$sad = substr_replace($sad3,"",0,$sad1);
$ssub1 = strpos($data,"<site_address_suburb>")+21;
$ssub2 = strpos($data,"</site_address_suburb>");
$ssub3 = substr_replace($data,"",$ssub2);
$ssub = substr_replace($ssub3,"",0,$ssub1);
$spc1 = strpos($data,"<site_postcode>")+15;
$spc2 = strpos($data,"</site_postcode>");
$spc3 = substr_replace($data,"",$spc2);
$spc = substr_replace($spc3,"",0,$spc1);
$pad1 = strpos($data,"<postal_address>")+16;
$pad2 = strpos($data,"</postal_address>");
$pad3 = substr_replace($data,"",$pad2);
$pad = substr_replace($pad3,"",0,$pad1);
$ppc1 = strpos($data,"<postal_address_postcode>")+25;
$ppc2 = strpos($data,"</postal_address_postcode>");
$ppc3 = substr_replace($data,"",$ppc2);
$ppc = substr_replace($ppc3,"",0,$ppc1);
$invet = substr($data,strpos($data,"<send_invoice_email>")+20,1);
if ($invet == "t") {$sib = "<font color=\"green\">&#9745;</font> Email <font color=\"#990000\">&#9744;</font> Fax <font color=\"#990000\">&#9744;</font> Post";}
$invft = substr($data,strpos($data,"<send_invoice_fax>")+18,1);
if ($invft == "t") {$sib = "<font color=\"#990000\">&#9744;</font> Email <font color=\"green\">&#9745;</font> Fax <font color=\"#990000\">&#9744;</font> Post";}
$invpt = substr($data,strpos($data,"<send_invoice_post>")+19,1);
if ($invpt == "t") {$sib = "<font color=\"#990000\">&#9744;</font> Email <font color=\"#990000\">&#9744;</font> Fax <font color=\"green\">&#9745;</font> Post";}
$nct = substr($data,strpos($data,"<new_customer>")+14,1);
if ($nct == "t") {$ncd = "<font color=\"green\">&#9745;</font> Yes <font color=\"#990000\">&#9744;</font> No ";}
else {$ncd = "<font color=\"#990000\">&#9744;</font> Yes <font color=\"green\">&#9745;</font> No ";}
$ncudt = substr($data,strpos($data,"<new_customer_update_details>")+29,1);
if ($ncudt == "t") {$ncd .= "<font color=\"green\">&#9745;</font> Update Customer Details";}
else {$ncd .= "<font color=\"#990000\">&#9744;</font> Update Customer Details";}
$nbmt = substr($data,strpos($data,"<troubleshoot_non_booting_machine>")+34,1);
if ($nbmt == "t") {$nbm = "<font color=\"green\">&#9745;</font>";}
else {$nbm = "<font color=\"#990000\">&#9744;</font>";}
$intt = substr($data,strpos($data,"<troubleshoot_internet_connection>")+34,1);
if ($intt == "t") {$int = "<font color=\"green\">&#9745;</font>";}
else {$int = "<font color=\"#990000\">&#9744;</font>";}
$dbu1 = strpos($data,"<data_backup>")+13;
$dbu2 = substr_replace($data,"",$dbu1+1);
$dbu3 = substr_replace($dbu2,"",0,$dbu1);
if ($dbu3 == "t") {$dbu = "<font color=\"green\">&#9745;</font>";}
else {$dbu = "<font color=\"#990000\">&#9744;</font>";}
$adsl1 = strpos($data,"<configure_adsl_hardware>")+25;
$adsl2 = substr_replace($data,"",$adsl1+1);
$adsl3 = substr_replace($adsl2,"",0,$adsl1);
if ($adsl3 == "t") {$adsl = "<font color=\"green\">&#9745;</font>";}
else {$adsl = "<font color=\"#990000\">&#9744;</font>";}
$os1 = strpos($data,"<operating_system>")+18;
$os2 = substr_replace($data,"",$os1+1);
$os3 = substr_replace($os2,"",0,$os1);
if ($os3 == "t") {$os = "<font color=\"green\">&#9745;</font>";}
else {$os = "<font color=\"#990000\">&#9744;</font>";}
$wifi1 = strpos($data,"<setup_wireless_network>")+24;
$wifi2 = substr_replace($data,"",$wifi1+1);
$wifi3 = substr_replace($wifi2,"",0,$wifi1);
if ($wifi3 == "t") {$wifi = "<font color=\"green\">&#9745;</font>";}
else {$wifi = "<font color=\"#990000\">&#9744;</font>";}
$ofc1 = strpos($data,"<install_microsoft_office>")+26;
$ofc2 = substr_replace($data,"",$ofc1+1);
$ofc3 = substr_replace($ofc2,"",0,$ofc1);
if ($ofc3 == "t") {$ofc = "<font color=\"green\">&#9745;</font>";}
else {$ofc = "<font color=\"#990000\">&#9744;</font>";}
$hwf1 = strpos($data,"<diagnose_hardware_fault>")+25;
$hwf2 = substr_replace($data,"",$hwf1+1);
$hwf3 = substr_replace($hwf2,"",0,$hwf1);
if ($hwf3 == "t") {$hwf = "<font color=\"green\">&#9745;</font>";}
else {$hwf = "<font color=\"#990000\">&#9744;</font>";}
$isw1 = strpos($data,"<install_software>")+18;
$isw2 = substr_replace($data,"",$isw1+1);
$isw3 = substr_replace($isw2,"",0,$isw1);
if ($isw3 == "t") {$isw = "<font color=\"green\">&#9745;</font>";}
else {$isw = "<font color=\"#990000\">&#9744;</font>";}
$ihw1 = strpos($data,"<install_supplied_hardware>")+27;
$ihw2 = substr_replace($data,"",$ihw1+1);
$ihw3 = substr_replace($ihw2,"",0,$ihw1);
if ($ihw3 == "t") {$ihw = "<font color=\"green\">&#9745;</font>";}
else {$ihw = "<font color=\"#990000\">&#9744;</font>";}
$drv1 = strpos($data,"<download_install_drivers>")+26;
$drv2 = substr_replace($data,"",$drv1+1);
$drv3 = substr_replace($drv2,"",0,$drv1);
if ($drv3 == "t") {$drv = "<font color=\"green\">&#9745;</font>";}
else {$drv = "<font color=\"#990000\">&#9744;</font>";}
$mal1 = strpos($data,"<virus_malware_removal>")+23;
$mal2 = substr_replace($data,"",$mal1+1);
$mal3 = substr_replace($mal2,"",0,$mal1);
if ($mal3 == "t") {$mal = "<font color=\"green\">&#9745;</font>";}
else {$mal = "<font color=\"#990000\">&#9744;</font>";}
$prt1 = strpos($data,"<install_printer>")+17;
$prt2 = substr_replace($data,"",$prt1+1);
$prt3 = substr_replace($prt2,"",0,$prt1);
if ($prt3 == "t") {$prt = "<font color=\"green\">&#9745;</font>";}
else {$prt = "<font color=\"#990000\">&#9744;</font>";}
$new1 = strpos($data,"<workstation_deployment>")+24;
$new2 = substr_replace($data,"",$new1+1);
$new3 = substr_replace($new2,"",0,$new1);
if ($new3 == "t") {$new = "<font color=\"green\">&#9745;</font>";}
else {$new = "<font color=\"#990000\">&#9744;</font>";}
$det1 = strpos($data,"<further_details>")+17;
$det2 = strpos($data,"</further_details>");
$det3 = substr_replace($data,"",$det2);
$det = substr_replace($det3,"",0,$det1);
$pqty1 = strpos($data,"<qty_1>")+7;
$pqty2 = strpos($data,"</qty_1>");
$pqty3 = substr_replace($data,"",$pqty2);
$pqty = substr_replace($pqty3,"",0,$pqty1);
$sqty1 = strpos($data,"<qty_2>")+7;
$sqty2 = strpos($data,"</qty_2>");
$sqty3 = substr_replace($data,"",$sqty2);
$sqty = substr_replace($sqty3,"",0,$sqty1);
$tqty1 = strpos($data,"<qty_3>")+7;
$tqty2 = strpos($data,"</qty_3>");
$tqty3 = substr_replace($data,"",$tqty2);
$tqty = substr_replace($tqty3,"",0,$tqty1);
$pdsc1 = strpos($data,"<description_1>")+15;
$pdsc2 = strpos($data,"</description_1>");
$pdsc3 = substr_replace($data,"",$pdsc2);
$pdsc = substr_replace($pdsc3,"",0,$pdsc1);
$sdsc1 = strpos($data,"<description_2>")+15;
$sdsc2 = strpos($data,"</description_2>");
$sdsc3 = substr_replace($data,"",$sdsc2);
$sdsc = substr_replace($sdsc3,"",0,$sdsc1);
$tdsc1 = strpos($data,"<description_3>")+15;
$tdsc2 = strpos($data,"</description_3>");
$tdsc3 = substr_replace($data,"",$tdsc2);
$tdsc = substr_replace($tdsc3,"",0,$tdsc1);
$pcrt1 = strpos($data,"<crate_1>")+9;
$pcrt2 = substr_replace($data,"",$pcrt1+1);
$pcrt3 = substr_replace($pcrt2,"",0,$pcrt1);
if ($pcrt3 == "t") {$pcrt = "<font color=\"green\">&#9745;</font>";}
else {$pcrt = "<font color=\"#990000\">&#9744;</font>";}
$scrt1 = strpos($data,"<crate_2>")+9;
$scrt2 = substr_replace($data,"",$scrt1+1);
$scrt3 = substr_replace($scrt2,"",0,$scrt1);
if ($scrt3 == "t") {$scrt = "<font color=\"green\">&#9745;</font>";}
else {$scrt = "<font color=\"#990000\">&#9744;</font>";}
$tcrt1 = strpos($data,"<crate_3>")+9;
$tcrt2 = substr_replace($data,"",$tcrt1+1);
$tcrt3 = substr_replace($tcrt2,"",0,$tcrt1);
if ($tcrt3 == "t") {$tcrt = "<font color=\"green\">&#9745;</font>";}
else {$tcrt = "<font color=\"#990000\">&#9744;</font>";}
$tord1 = strpos($data,"<ordered_3>")+11;
$tord2 = substr_replace($data,"",$tord1+1);
$tord3 = substr_replace($tord2,"",0,$tord1);
if ($tord3 == "t") {$tord = "<font color=\"green\">&#9745;</font>";}
else {$tord = "<font color=\"#990000\">&#9744;</font>";}
$sord1 = strpos($data,"<ordered_2>")+11;
$sord2 = substr_replace($data,"",$sord1+1);
$sord3 = substr_replace($sord2,"",0,$sord1);
if ($sord3 == "t") {$sord = "<font color=\"green\">&#9745;</font>";}
else {$sord = "<font color=\"#990000\">&#9744;</font>";}
$pord1 = strpos($data,"<ordered_1>")+11;
$pord2 = substr_replace($data,"",$pord1+1);
$pord3 = substr_replace($pord2,"",0,$pord1);
if ($pord3 == "t") {$pord = "<font color=\"green\">&#9745;</font>";}
else {$pord = "<font color=\"#990000\">&#9744;</font>";}
$pprc1 = strpos($data,"<price_1>")+9;
$pprc2 = strpos($data,"</price_1>");
$pprc3 = substr_replace($data,"",$pprc2);
$pprc = substr_replace($pprc3,"",0,$pprc1);
$sprc1 = strpos($data,"<price_2>")+9;
$sprc2 = strpos($data,"</price_2>");
$sprc3 = substr_replace($data,"",$sprc2);
$sprc = substr_replace($sprc3,"",0,$sprc1);
$tprc1 = strpos($data,"<price_3>")+9;
$tprc2 = strpos($data,"</price_3>");
$tprc3 = substr_replace($data,"",$tprc2);
$tprc = substr_replace($tprc3,"",0,$tprc1);
$jbc1 = strpos($data,"<job_complete>")+14;
$jbc2 = substr_replace($data,"",$jbc1+1);
$jbc3 = substr_replace($jbc2,"",0,$jbc1);
if ($jbc3 == "t") {$jbc = "<font color=\"green\">&#9745;</font> Yes</td><td><font color=\"#990000\">&#9744;</font> No";}
else {$jbc = "<font color=\"#990000\">&#9744;</font> No</td><td><font color=\"green\">&#9745;</font> No";}
$fup1 = strpos($data,"<follow_up>")+11;
$fup2 = substr_replace($data,"",$fup1+1);
$fup3 = substr_replace($fup2,"",0,$fup1);
if ($fup3 == "t") {$fup = "<font color=\"green\">&#9745;</font> Yes</td><td><font color=\"#990000\">&#9744;</font> No";}
else {$fup = "<font color=\"#990000\">&#9744;</font> Yes</td><td><font color=\"green\">&#9745;</font> No";}
$fuw1 = strpos($data,"<follow_up_when>")+16;
$fuw2 = strpos($data,"</follow_up_when>");
$fuw3 = substr_replace($data,"",$fuw2);
$fuw = substr_replace($fuw3,"",0,$fuw1);
$lbr1 = strpos($data,"<labour>")+8;
$lbr2 = strpos($data,"</labour>");
$lbr3 = substr_replace($data,"",$lbr2);
$lbr = substr_replace($lbr3,"",0,$lbr1);
$hwt1 = strpos($data,"<hardware>")+10;
$hwt2 = strpos($data,"</hardware>");
$hwt3 = substr_replace($data,"",$hwt2);
$hwt = substr_replace($hwt3,"",0,$hwt1);
$total1 = strpos($data,"<total>")+7;
$total2 = strpos($data,"</total>");
$total3 = substr_replace($data,"",$total2);
$total = substr_replace($total3,"",0,$total1);
$prec1 = strpos($data,"<payment_received>")+18;
$prec2 = substr_replace($data,"",$prec1+1);
$prec3 = substr_replace($prec2,"",0,$prec1);
if ($prec3 == "t") {$prec = "<font color=\"green\">&#9745;</font>";}
else {$prec = "<font color=\"#990000\">&#9744;</font>";}
$send1 = strpos($data,"<send_receipt>")+14;
$send2 = substr_replace($data,"",$send1+1);
$send3 = substr_replace($send2,"",0,$send1);
if ($send3 == "t") {$send = "<font color=\"green\">&#9745;</font>";}
else {$send = "<font color=\"#990000\">&#9744;</font>";}
$csh1 = strpos($data,"<payment_by_cash>")+17;
$csh2 = substr_replace($data,"",$csh1+1);
$csh3 = substr_replace($csh2,"",0,$csh1);
if ($csh3 == "t") {$csh = "<font color=\"green\">&#9745;</font>";}
else {$csh = "<font color=\"#990000\">&#9744;</font>";}
$chqt = substr($data,strpos($data,"<payment_by_chq>")+16,1);
if ($chqt == "t") {$chq = "<font color=\"green\">&#9745;</font>";}
else {$chq = "<font color=\"#990000\">&#9744;</font>";}
$crd1 = strpos($data,"<payment_by_cc>")+15;
$crd2 = substr_replace($data,"",$crd1+1);
$crd3 = substr_replace($crd2,"",0,$crd1);
if ($crd3 == "t") {$crd = "<font color=\"green\">&#9745;</font>";}
else {$crd = "<font color=\"#990000\">&#9744;</font>";}
$inv1 = strpos($data,"<payment_by_dd>")+15;
$inv2 = substr_replace($data,"",$inv1+1);
$inv3 = substr_replace($inv2,"",0,$inv1);
if ($inv3 == "t") {$eft = "<font color=\"green\">&#9745;</font>";}
else {$eft = "<font color=\"#990000\">&#9744;</font>";}
$act = substr($data,strpos($data,"<payment_by_account>")+20,1);
if ($act == "t") {$inv = "<font color=\"green\">&#9745;</font>";}
else {$inv = "<font color=\"#990000\">&#9744;</font>";}
$chqnam1 = strpos($data,"<chq_name>")+10;
$chqnam2 = strpos($data,"</chq_name>");
$chqnam3 = substr($data,$chqnam1,$chqnam2-$chqnam1);
if ($chqnam3 != "") {$chqnam = "<tr><td>Name on Cheque:</td><td colspan=\"5\" style=\"background: #ffffe3\">".$chqnam3."</td></tr>";}

?>
