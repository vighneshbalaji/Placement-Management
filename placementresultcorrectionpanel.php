<form id="plaresultcorrectionform" name="plaresultcorrectionform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<input type="hidden" name="plaresultcorrectioninstitution" id="plaresultcorrectioninstitution" value="<?php echo substr($_SESSION["UserId"],2); ?>" />

<div class="panel panel-primary">
	<div class="panel-heading">Placement Result Update Form</div>
	<div class="panel-body">
	
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plaresultcorrectionplacementid">Placement Id & Company</label>
					<select class="form-control" name="plaresultcorrectionplacementid" id="plaresultcorrectionplacementid" tabindex="1" autofocus required>
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
				<label for="plaresultcorrectiondepartment">Department</label>
				<select class="form-control" name="plaresultcorrectiondepartment" id="plaresultcorrectiondepartment" onchange="changeSectionListInPlaResultCorrection(this.value);" tabindex="2" required>
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
							<label for="plaresultcorrectionyearofjoin">Year Of Join</label>
							<input type="month" class="form-control" name="plaresultcorrectionyearofjoin" id="plaresultcorrectionyearofjoin" tabindex="3" step="12"
							min="2000-06" 
							required disabled />
						</div>
				</div>
				<div class="col-sm-2">
				<!-- Section -->
					<div class="form-group">
						<label for="plaresultcorrectionsection">Section</label>
						<select class="form-control" name="plaresultcorrectionsection" id="plaresultcorrectionsection" tabindex="4" disabled required multiple>
						</select>
					</div>
				</div>
		
			<div class="col-sm-2">
				<div class="form-group" align="center">
					<button id="plaresultcorrectionsearchbtn" name="plaresultcorrectionsearchbtn" type="button" class="btn btn-info btn-md" onclick="viewStudentIdInPlaResultCorrection(studentIdsForPlaResultCorrection(plaresultcorrectioninstitution,plaresultcorrectiondepartment,plaresultcorrectionyearofjoin,plaresultcorrectionsection),plaresultcorrectionplacementid.value);" tabindex="5" >Search</button>
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
						<label for="plaresultcorrectionstudentid">Student ID</label> <span style="color:red"> * Select those who are all placed in above selected company</span>
						<select class="form-control" name="plaresultcorrectionstudentid[]" id="plaresultcorrectionstudentid[]" tabindex="6" required disabled multiple>
						</select>
					</div>
				</div>			
			</div>
	</div> <!-- Panel Body -->
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div align="right">
					<button id="plaresultcorrectionsubbtn" name="plaresultcorrectionsubbtn" type="submit" class="btn btn-info btn-md" tabindex="7" disabled>Remove</button>
					<button id="plaresultcorrectionclrbtn" name="plaresultcorrectionclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="8" >Clear</button>
					<button id="plaresultcorrectioncnclbtn" name="plaresultcorrectioncnclbtn" type="button" class="btn btn-danger btn-md" tabindex="9">Cancel</button>
					</div>
			</div>
		</div>
	</div>
</div><!-- Panel 2 End -->



</form>