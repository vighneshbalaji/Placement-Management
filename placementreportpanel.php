<?php
	$tempinstituteid = "in".substr($_SESSION["UserId"],2);
	
	$institutedetailqr1 = "SELECT `departmentname`,`years` FROM `departmentinfo` WHERE instituteid = '$tempinstituteid' ORDER BY `departmentname`";
						
	if(! $institutedetailresult1 = $db->query($institutedetailqr1)) die("Unable To connect Search Query 1 ");
	
	$institutedetailqr2 = "SELECT MAX(`sections`) as `sections` FROM `departmentinfo` WHERE instituteid = '$tempinstituteid'";
						
	if(! $institutedetailresult2 = $db->query($institutedetailqr2)) die("Unable To connect Search Query 1 ");
	
	$tabindex = 3;

?>
<form id="placementreportform" name="placementreportform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Placement Report Generate</div>			
	<div class="panel-body">
		<div class="form-group row">
		
			<div class="col-sm-6">
				<label for="plareportplacementid">Placement Id & Company</label>
					<select class="form-control" name="plareportplacementid" id="plareportplacementid" tabindex="1" autofocus required>
					<option value="" selected>Select One</option>
					<?php
						$plaplacementidlistqr1 = "SELECT `placementid`,`companyid`,`jobinfo`,`date` FROM `placementdetails` WHERE status = 1 and `instituteid` LIKE '".$_SESSION["UserInstitute"]."%' ORDER BY `date`";
						
						if(! $plaplacementidlistres1 = $db->query($plaplacementidlistqr1)) die("Unable To connect placement update form Query 1 ");
						
						while($plaplacementidlistrow1 = $plaplacementidlistres1->fetch_assoc())
						{
							$placompanylistqr = "SELECT `companyname` FROM `company` WHERE companyid = '$plaplacementidlistrow1[companyid]'";
						
							if(! $placompanylistres = $db->query($placompanylistqr)) die("Unable To connect placement update form Query 2 ");
							
							$placompanylistrow = $placompanylistres->fetch_assoc();
					?>
					
						<option value="<?php echo $plaplacementidlistrow1["placementid"] ?>"
						title="<?php echo $plaplacementidlistrow1["placementid"]." - ".$placompanylistrow["companyname"]." - ".date("F jS, Y",strtotime($plaplacementidlistrow1["date"]))." - ".$plaplacementidlistrow1["jobinfo"]; ?>" >
						<?php echo $plaplacementidlistrow1["placementid"]." - ".$placompanylistrow["companyname"]; ?>
						</option>
						
					<?php
						}
					?>
					</select>
			</div>
		
			<div class="col-sm-6">
		
			<label for="plareportregunregopt">Registered / Unregistered</label><br />
			<select class="form-control" name="plareportregunregopt" id="plareportregunregopt" tabindex="2">
				<option value="">Select One </option>
				<option value="y">Registered </option>
				<option value="n">Unregistered </option>
			</select>
				
			</div>

		</div> <!-- End form-group and row div -->
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Department & Section Info</div>			
	<div class="panel-body">
		<div class="form-group row">
		
			<div class="col-sm-3">
				<label for="plareportyearofjoin">Year Of Join</label>
				<input type="month" class="form-control" name="plareportyearofjoin" id="plareportyearofjoin" tabindex="<?php echo $tabindex++; ?>" step="12"
				max="<?php if(date("m") < 6) echo (date("Y") - 3); else echo (date("Y") - 2); ?>-06" 
				min="2000-06" />
			</div>
		
			<div class="col-sm-6">
		
			<label for="plareportdepartment">Department</label><br />
				<?php
					while($institutedetailrow1 = $institutedetailresult1->fetch_assoc())
					{				
				?>
						<label class="checkbox-inline">
						<input name="plareportdepartment[]" id="plareportdepartment[]" class="form-check-input" type="checkbox" value="<?php echo $institutedetailrow1["departmentname"];?>" tabindex="<?php echo $tabindex++; ?>" /><?php echo strtoupper($institutedetailrow1["departmentname"]); ?>
						</label>
				<?php
					}
				?>
				
			</div>
			
			<div class="col-sm-3">
				<label for="plareportsection">Section</label><br />
				<?php
					$institutedetailrow2 = $institutedetailresult2->fetch_assoc();
					for($i = 0; $i < $institutedetailrow2["sections"]; $i++)			
					{
				?>
						<label class="checkbox-inline">
						<input name="plareportsection[]" id="plareportsection[]" class="form-check-input" type="checkbox" tabindex="<?php echo $tabindex++; ?>" value="<?php echo chr(97+$i);?>"><?php echo chr(65+$i); ?>
						</label>
				<?php
					}
				?>
			</div>
			
		</div> <!-- End form-group and row div -->
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div align="right">
					<button id="plareportgeneratebtn" name="plareportgeneratebtn" type="submit" tabindex="<?php echo $tabindex++; ?>" class="btn btn-info btn-md" >Generate</button>				
					<button id="plareportclrbtn" name="plareportclrbtn" type="reset" tabindex="<?php echo $tabindex++; ?>" class="btn btn-primary btn-md" >Clear</button>
					<button id="plareportcnclbtn" name="plareportcnclbtn" type="button" tabindex="<?php echo $tabindex++; ?>" class="btn btn-danger btn-md" >Cancel</button>				
				</div>
			</div>
		</div>
	</div>
</div>