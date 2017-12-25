<form id="plaresultuptform" name="plaresultuptform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<input type="hidden" name="plaresultuptinstitution" id="plaresultuptinstitution" value="<?php echo substr($_SESSION["UserId"],2); ?>" />

<div class="panel panel-primary">
	<div class="panel-heading">Placement Result Update Form</div>
	<div class="panel-body">
	
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plaresultuptplacementid">Placement Id & Company</label>
					<select class="form-control" name="plaresultuptplacementid" id="plaresultuptplacementid" tabindex="1" autofocus required>
					<option value="" selected>Select One</option>
					<?php
						$tempinstituteid = "in".substr($_SESSION["UserId"],2);
						$plaplacementidlistqr1 = "SELECT `placementid`,`companyid`,`jobinfo`,`date` FROM `placementdetails` WHERE status = 0 and `instituteid` = '".$tempinstituteid."' and date BETWEEN date_add(CURRENT_DATE,INTERVAL -60 day) and CURRENT_DATE ORDER BY `date`";
						
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
			</div>
			<div class="col-sm-2">
			
			<!-- Department SELECT Option -->
			
			<div class="form-group">
				<label for="plaresultuptdepartment">Department</label>
				<select class="form-control" name="plaresultuptdepartment" id="plaresultuptdepartment" onchange="changeSectionListInPlaResultUpdate(this.value);" tabindex="2" required>
				<option value="" selected>Select One</option>
				<?php 
					$tempinstituteid = "in".substr($_SESSION["UserId"],2);
					$institutelistqr2 = "SELECT departmentname FROM departmentinfo WHERE instituteid = '$tempinstituteid'";
					
					if(! $institutelistres2 = $db->query($institutelistqr2)) die("Unable To connect Search Query 2 ");
					
					while($institutelistrow2 = $institutelistres2->fetch_assoc())
					{					
				?>
				  <option value = "<?php echo $institutelistrow2["departmentname"]; ?>" ><?php echo strtoupper($institutelistrow2["departmentname"]); ?></option>
				<?php
					}
				?>
				</select>
			</div>
			
			</div>
			
				<div class="col-sm-3">
					<!-- Joined Year -->
						<div class="form-group">
							<label for="plaresultuptyearofjoin">Year Of Join</label>
							<input type="month" class="form-control" name="plaresultuptyearofjoin" id="plaresultuptyearofjoin" tabindex="3" step="12"
							min="2000-06" 
							required disabled />
						</div>
				</div>
				<div class="col-sm-2">
				<!-- Section -->
					<div class="form-group">
						<label for="plaresultuptsection">Section</label>
						<select class="form-control" name="plaresultuptsection" id="plaresultuptsection" tabindex="4" disabled required multiple>
						</select>
					</div>
				</div>
		
			<div class="col-sm-2">
				<div class="form-group" align="center">
					<button id="plaresultuptsearchbtn" name="plaresultuptsearchbtn" type="button" class="btn btn-info btn-md" onclick="viewStudentIdInPlaResultUpdate(studentIdsForPlaResult(plaresultuptinstitution,plaresultuptdepartment,plaresultuptyearofjoin,plaresultuptsection),plaresultuptplacementid.value);" tabindex="5" >Search</button>
				</div>
			</div>			
		</div>							
	</div> <!-- Panel Body -->
</div>
	
<div class="panel panel-primary">
	<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="plaresultuptstudentid">Student ID</label> <span style="color:red"> * Select those who are all placed in above selected company</span>
						<select class="form-control" name="plaresultuptstudentid[]" id="plaresultuptstudentid[]" tabindex="6" required disabled multiple>
						</select>
					</div>
				</div>			
			</div>
	</div> <!-- Panel Body -->
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div align="right">
					<button id="plaresultuptsubbtn" name="plaresultuptsubbtn" type="submit" class="btn btn-info btn-md" tabindex="7" disabled>Submit</button>
					<button id="plaresultuptclrbtn" name="plaresultuptclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="8" >Clear</button>
					<button id="plaresultuptcnclbtn" name="plaresultuptcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="9">Cancel</button>
					</div>
			</div>
		</div>
	</div>
</div><!-- Panel 2 End -->



</form>