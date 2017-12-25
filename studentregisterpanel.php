<div class="regform">
	<div class="panel panel-primary">
		<div class="panel-heading">Registration Form</div>
		<div class="panel-body">
		
		
			<form id="sturegister" name="sturegister" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			
			<!-- Department SELECT Option -->

				<div class="form-group" align="justify"> 
					<label for="bdepartment">Department</label>
					<select class="form-control" name="bdepartment" id="bdepartment" onchange="changeSectionList(this.value);" required >
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
				
				
			<!-- Joined Year -->
				<div class="form-group">
					<label for="byearofjoin">Year Of Join</label>
					<input type="month" class="form-control" name="byearofjoin" id="byearofjoin" step="12" min="2000-06" max="<?php if(date("m") < 6) echo (date("Y")-3); else echo (date("Y")-2); ?>-06"  required />
				</div>
				
			<!-- Section -->
				<div class="form-group">
						<label for="bsection">Section</label>
						<select class="form-control" name="bsection" id="bsection" disabled required/>	
						<option value="" selected>Select One</option>
						</select>
				</div>
			
			<!-- No of Students -->
				<div class="form-group">
					<label for="bnstudents">No of Students</label>
					<input type="number" class="form-control" name="bnstudents" id="bnstudents" min="1" max="100" required />
				</div>
				
			<!-- Buttons -->
				<div class="form-group" align="right">
					<button id="regregisterbtn" name="regregisterbtn" type="submit" class="btn btn-info btn-md" >Register</button>
					<button id="regclrbtn" name="regclrbtn" type="reset" class="btn btn-primary btn-md" >Clear</button>
					<button id="regcnclbtn" name="regcnclbtn" type="button" class="btn btn-danger btn-md">Cancel</button>
				</div>
			
		</form>
			
		
		</div> <!-- Panel Body -->
	</div>
</div>