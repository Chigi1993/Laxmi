<?php
	include_once("Function.php");
	if(isset($_POST['submit']))
	{		
		$fname=$_POST['txtfname'];
		$mname=$_POST['txtmname'];
		$lname=$_POST['txtlname'];
		$phone=$_POST['txtphone'];
		$email=$_POST['txtemail'];
		$gender=$_POST['gender'];
		$error="";
		
		if (isset($_FILES['aadharCard']))
		{
			$path = "pdf/".$email."/AadharCard/";
			if (!is_dir($path))
			{
				mkdir($path, 0, true);
			}
			  
			  $aadharCard = $_FILES['aadharCard']['name'];
			  $file_size =$_FILES['aadharCard']['size'];
			  $file_tmp =$_FILES['aadharCard']['tmp_name'];
			  $file_type=$_FILES['aadharCard']['type'];
			  $file_ext=strtolower(end(explode('.',$_FILES['aadharCard']['name'])));
			  
			  $expensions= array("jpeg","jpg","png");
      
			  if(in_array($file_ext,$expensions)=== false){
				 $errors="extension not allowed, please choose a JPEG or PNG file.";
			  }
			  
				if($file_size > 15728640){
				 $error='File is not upload';
				}
		
			  if(empty($error)==true){
				 move_uploaded_file($file_tmp,$path.$aadharCard);
				}
				else
				{
					echo "Error.";
				}
		}
		
		if (isset($_FILES['votingCard']))
		{
			$path = "pdf/".$email."/VotingCard/";
			if (!is_dir($path))
			{
				mkdir($path, 0, true);
			}
			 
			  $votingCard = $_FILES['votingCard']['name'];
			  //$file_name = "AadharCard";	
			  $file_size =$_FILES['votingCard']['size'];
			  $file_tmp =$_FILES['votingCard']['tmp_name'];
			  $file_type=$_FILES['votingCard']['type'];
			  $file_ext=strtolower(end(explode('.',$_FILES['votingCard']['name'])));
			  
			  $expensions= array("jpeg","jpg","png");
      
			  if(in_array($file_ext,$expensions)=== false){
				 $errors="extension not allowed, please choose a JPEG or PNG file.";
			  }
				if($file_size > 15728640){
				 $error='File is not upload';
				}
		
			  if(empty($error)==true){
				 move_uploaded_file($file_tmp,$path.$votingCard);
				}
				else
				{
					echo "Error.";
				}
		}
		
		if (isset($_FILES['other']))
		{
			$path = "pdf/".$email."/Other/";
			if (!is_dir($path))
			{
				mkdir($path, 0, true);
			}
			 
			  $otherDoc = $_FILES['other']['name'];
			  $file_size =$_FILES['other']['size'];
			  $file_tmp =$_FILES['other']['tmp_name'];
			  $file_type=$_FILES['other']['type'];
			  $file_ext=strtolower(end(explode('.',$_FILES['other']['name'])));
			  
			  $expensions= array("jpeg","jpg","png");
      
			  if(in_array($file_ext,$expensions)=== false){
				 $errors="extension not allowed, please choose a JPEG or PNG file.";
			  }
				if($file_size > 15728640){
				 $error='File is not upload';
				}
		
			  if(empty($error)==true){
				 move_uploaded_file($file_tmp,$path.$otherDoc);
				}
				else
				{
					echo "Error.";
				}
		}
		
		$path = "pdf/".$email."/Policy/";
		if (!is_dir($path))
		{
			mkdir($path, 0, true);
		}
		
		$qry="insert into clients values ('','$fname','$mname','$lname','$phone','$email','$gender','$aadharCard','$votingCard','$otherDoc')";

		if (mysql_query($qry))// or die(mysql_error());
		{
			$qry="insert into userLogin values ('','$email','$phone')";
			if (mysql_query($qry))// or die(mysql_error());
			{
				header("Location:allCustomer.php");
			}
		}
		else
		{
			header("Location:allCustomer.php");
		}	
	}
	else
	{
		header("Location:allCustomer.php");
		
	}
?>