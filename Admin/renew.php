<?php
	include_once("Function.php");
	if (isset($_POST['submit']))
	{
		$email=$_POST['txtemail'];
		$policyName=$_POST['txtPolicyName'];
		echo $expDate=$_POST['txtRenewDate'];
		if ($expDate==12)
			$date=date('Y-m-d', strtotime('+12 months'));
		if ($expDate==9)
			$date=date('Y-m-d', strtotime('+9 months'));
		if ($expDate==6)
			$date=date('Y-m-d', strtotime('+6 months'));
		if ($expDate==3)
			$date=date('Y-m-d', strtotime('+3 months'));
			
		$qry="select * from clients where emailId='$email'";
		$res=mysql_query($qry) or die(mysql_error());
		$row=mysql_fetch_assoc($res);
		
		echo "<br>".$clientId=$row['clientId'];
		$qry="update policy set expireDate='$date',emailStatus=0 where clientId='$clientId' AND policyName='$policyName'";
		
		
		if (mysql_query($qry))
		{
			header("Location:todayRenewal.php");
		}
		else
		{
			header("Location:renewalPolicy.php?txtemail='$email'&fileName='$policyName'");
		}
		
	}
	else
	{
		header("Location:newCustomer.php");
	}
?>
