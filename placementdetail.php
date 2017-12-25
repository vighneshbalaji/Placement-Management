<?php

	$q1 = "SELECT `placementid`, `companyid`, `jobinfo`, `date` FROM `placementdetails` where `instituteid` LIKE '".$_SESSION["UserInstitute"]."%' and `date` BETWEEN DATE_ADD(CURRENT_DATE,INTERVAL 1 day) and DATE_ADD(CURRENT_DATE,INTERVAL 7 day) ORDER BY `date`";
	
	//$q1 = "SELECT `placementid`, `companyid`, `jobinfo`, `date` FROM `placementdetails` where date BETWEEN date_add(CURRENT_DATE,INTERVAL 2 day) and date_add(CURRENT_DATE,INTERVAL 7 day) ORDER BY `date`";
	
	if(! $res1 = $db->query($q1) ) die("Unable to connect q1 in placement details");
	
	$col = 1;
	
	while( $row1 = $res1->fetch_assoc())
	{	
		$q2 = "SELECT `companyname` FROM `company` WHERE `companyid` = '$row1[companyid]'";
		
		if(! $res2 = $db->query($q2) ) die("Unable to connect q2 in placement details");
		
		$row2 = $res2->fetch_assoc();

?>
		<?php 
			if($col == 1)
			{
		?>
			<div class="row">
				<div class="col-sm-4" align="center">
		<?php 
			}
			else if(($col == 2)||($col == 3))
			{
		?>
				<div class="col-sm-4" align="center">
		<?php
			}
		?>
					<div class="card">
						<div class="card-header">
						<img class="card-img-top img-responsive center-block" src="companydetails/<?php echo $row2['companyname']; ?>/<?php echo $row2['companyname'].".png"; ?>" alt="<?php echo $row2['companyname']; ?>" />
						</div>
						<div class="card-body">
						<h4><b><?php echo $row1['jobinfo']; ?></b></h4> 
						<p><?php echo $row2['companyname']; ?> placement drive on<br /> <?php echo date("F jS, Y",strtotime($row1['date'])); ?></p> 
						</div>
						<div class="card-footer">
						<a href="placementformregister.php?placementid=<?php echo $row1['placementid']; ?>" class="btn btn-primary">Register</a>
						</div>
					</div>
		<?php
			if(($col == 1)||($col == 2))
			{
		?>
				</div>
		<?php
				$col++;
			}
			else if($col == 3)
			{
		?>
				</div>
				</div>
		<?php
				$col = 1;
			}
		?>
<?php

	}
	if(($col == 2)||($col == 3))
	{
?>
		</div>
<?php

	}
?>