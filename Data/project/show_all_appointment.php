<?php
	session_start();
	
	if(isset($_SESSION['cid']))
	{
		$str="appointment";
		$menu="app_all";
	$arr_patient['cid']=$_SESSION['cid'];
?>
<html>
	<head><TITLE>Registration Form</TITLE></head>
	<link href="css/c1.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js" language="JavaScript"></script>
	<script src="js/jq.js" language="JavaScript"></script>
	<LINK type="text/css" href="css/skeleton.css" rel="StyleSheet">
	<LINK type="text/css" href="css/base.css" rel="StyleSheet">
	<LINK type="text/css" href="css/style.css" rel="StyleSheet">
	<LINK type="text/css" href="css/table.css" rel="StyleSheet">
	<LINK type="text/css" href="css/multiselect.css" rel="StyleSheet">
	<LINK type="text/css" href="css/base.css" rel="StyleSheet">
	<SCRIPT>
	$(document).ready(function(){
		$(".delete-click").click(function(){
// 			$(this).addClass("dark_overlay");
// 			$(this).addClass("bright_content");
			$("#deletelight").css('display', 'block');
			$("#deletefade").css('display', 'block');
		});
		$("#deleteclose").click(function(){
// 			$(this).addClass("dark_overlay");
// 			$(this).addClass("bright_content");
			$("#deletelight").css('display', 'none');
			$("#deletefade").css('display', 'none');
		});
			if($('#editlight').text()!="")
			{
				$("#editlight").css('display', 'block');
				$("#editfade").css('display', 'block');
			}

		$("#editclose").click(function(){
// 			$(this).addClass("dark_overlay");
// 			$(this).addClass("bright_content");
			$("#editlight").css('display', 'none');
			$("#editfade").css('display', 'none');
		});
		
	});
	function confirmSubmit()
		{
			var agree=confirm("Are you sure you wish to Delete this Entry?");
			if (agree)
				return true ;
			else
				return false ;
		}
</SCRIPT>
<BODY>
<div id="editfade" class="dark_overlay"></div>
	<?php
		include_once("connect.php");
		include_once("global.php");
		include_once("function.php");
		include_once('paging.php');
		
		include_once("datepicker/dropdown-month-year.php");
	?>
	<?php include_once("header.php");?>
    
<div id="container">
	<?php include_once("app_menu.php");?>
	
	<?php
	$fdir = $_SERVER['PHP_SELF'];
	if(!isset($_GET['p']))
  	{
     	 $page=1;
  	}
  	else
  	{
      	$page = $_GET['p'];
  	}
	 
	$sel_res=selAllAppointment($arr_patient);
	$lan=count($sel_res);
	$pager=pagedata($GLOBALS['no_row'],$lan,$page);
	//print_r($sel_res);
	//print_r($pager);
	?>
	
    <?php
	
	$lan=count($sel_res);
	$start=$pager['offset'];
	$end=$pager['limit'];
	if($end>$lan)
	{
		$end=$lan;
	}
	?>
	<div class="bit-14">
		<div class="box-element">
			
			<div class="box-head-light"><span class="typography-16"></span><h3>Show All Appoinment</h3></div>
			
			<div class="box-content no-padding">
			 <section class="no-padding">
					<div class="lists">
						<ul class="datalist">
							<li><div><a href="show_appointment_alpha_wise.php?sort=%" class="active">All</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=A%">A</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=B%">B</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=C%">C</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=D%">D</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=E%">E</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=F%">F</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=G%">G</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=H%">H</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=I%">I</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=J%">J</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=K%">K</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=L%">L</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=M%">M</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=N%">N</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=O%">O</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=P%">P</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=Q%">Q</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=R%">R</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=S%">S</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=T%">T</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=U%">U</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=V%">V</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=W%">W</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=X%">X</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=Y%">Y</a></div></li>
							<li><div><a href="show_appointment_alpha_wise.php?sort=Z%">Z</a></div></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</section>
						<br>
		<?php
			if(!empty($sel_res))
			{
		?>
			<table class="i-table fullwidth">
				<thead>
				<tr>
					<td>Apponiment no</td>
					<td>Patient Name</td>
					<td>Gender</td>
					<td>Phone No</td>
					<td>Date</td>
					<td>Time</td>
					<td>Time Duration</td>
        				<td>Notes</td>
					
				</tr>
				</thead>
				<tbody>
				
	<?php
	for($i=$start;$i<$end;$i++)
	{
		$color++;
	?>			<tr height="35">
	<?php
				echo "<td>".$sel_res[$i]['appointment_no']."</td>";
				//echo "<td title='".$sel_res[$i]['pname']."'><a href='info_of_appointment.php?aid=".$sel_res[$i]['id']."'>".compressDetail($sel_res[$i]['pname'],$GLOBALS['pcno'])."</a></td>";
				echo "<td title='".$sel_res[$i]['pname']."'>".compressDetail($sel_res[$i]['pname'],$GLOBALS['pcno'])."</td>";
				echo "<td>".$sel_res[$i]['gender']."</td>";
				echo "<td>".$sel_res[$i]['phone']."</td>";
				echo "<td>".$sel_res[$i]['date']."</td>";
				echo "<td>".$sel_res[$i]['time']."</td>";
				echo "<td>".$sel_res[$i]['time_duration']."</td>";
				echo "<td title='".$sel_res[$i]['notes']."'>".compressDetail($sel_res[$i]['notes'],$GLOBALS['ncno'])."</td>";
			
	?>
			
			</tr>
			</tbody>
	<?php
				
	
	}
	
	?>
	</table>
		</fieldset>


    <section>
		<div id="datatable_paginate" class="dataTables_paginate paging_full_numbers no-padding">
					<?php
						page_strip($page,$fdir,$pager);
					?>
		</div>
		<div class="clearfix"></div>
	</section>
    <?php
			}
			else
			{
				echo "<div class='alert-msg info-msg' align='center'>No Appointment Exist</div>";
			}
	?>
</div>

</div>
</div>
</div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/multiselect.js" type="text/javascript"></script>
	<script type="text/javascript"> 
	var config = {
	'.chzn-select'           : {},
	'.chzn-select-deselect'  : {allow_single_deselect:true},
	'.chzn-select-no-single' : {disable_search_threshold:10},
	'.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
	'.chzn-select-width'     : {width:"95%"}
	}
	for (var selector in config) {
	$(selector).chosen(config[selector]);
	}
</script>
</BODY>
</html>
<?php
	}
	else
	{
	
		header("location:login.php");	
	}
?>
