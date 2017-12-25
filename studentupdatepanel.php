<form id="stuupdateinsform" name="stuupdateinsform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

<input type="hidden" name="uptinstitution" id="uptinstitution" value="<?php echo substr($_SESSION["UserId"],2)?>" />

<div class="panel panel-primary">
	<div class="panel-heading">Student Detail Updation Form</div>
	<div class="panel-body">
	
		<div class="row">
			<div class="col-sm-5">
				<div class="form-group" align="justify"><!-- Department SELECT Option -->
					<label for="uptdepartment">Department</label>
					<select class="form-control" name="uptdepartment" id="uptdepartment" onchange="changeSectionListInUpdate(this.value);" tabindex="2" required >
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
							<label for="uptyearofjoin">Year Of Join</label>
							<input type="month" class="form-control" name="uptyearofjoin" id="uptyearofjoin" tabindex="3" step="12"
							min="2000-06" 
							required disabled />
						</div>
				</div>
				<div class="col-sm-2">
				<!-- Section -->
					<div class="form-group">
						<label for="uptsection">Section</label>
						<select class="form-control" name="uptsection" id="uptsection" tabindex="4" disabled required>	
						<option value="" selected>Select One</option>
						</select>
					</div>
				</div>
		
			<div class="col-sm-2">
				<div class="form-group" align="center">
					<button id="uptsearchbtn1" name="uptsearchbtn1" type="button" class="btn btn-info btn-md" onclick="viewStudentId(studentIds(uptinstitution,uptdepartment,uptyearofjoin,uptsection));" tabindex="5">Search</button>
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
						<label for="uptstudentid">Student ID</label>
						<select class="form-control" name="uptstudentid" id="uptstudentid" tabindex="6" onchange="viewStudentDetails(uptstudentid.value);" required disabled>
						<option value="" selected>Select One</option>
						</select>
					</div>
				</div>			
			</div>
	</div> <!-- Panel Body -->
</div><!-- Panel 2 End -->

<div class="panel panel-primary">
	<div class="panel-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="uptstudentname">Student Name</label>
						<input type="text" class="form-control" id="uptstudentname" name="uptstudentname" tabindex="8" disabled required />
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="uptstudentsslc">SSLC %</label>
						<input type="number" class="form-control" id="uptstudentsslc" name="uptstudentsslc" tabindex="9" min="0" max="100" step="1" disabled />
					</div>
				</div>		
				<div class="col-sm-2">
					<div class="form-group">
						<label for="uptstudenthsc">HSC %</label>
						<input type="number" class="form-control" id="uptstudenthsc" name="uptstudenthsc" tabindex="10" min="0" max="100" step="1" disabled />
					</div>
				</div>		
				<div class="col-sm-2">
					<div class="form-group">
						<label for="uptstudentug">UG %</label>
						<input type="number" class="form-control" id="uptstudentug" name="uptstudentug" tabindex="11" min="0" max="100" step="1" disabled />
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="uptstudentarr">Arrear</label>
						<select class="form-control" name="uptstudentarr" id="uptstudentarr" tabindex="12" required disabled >
							<option value="" selected>Select One</option>
							<option value="y">Yes - Some Arrear</option>
							<option value="n">None</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="uptstudentaddress">Address</label>
						<textarea class="form-control" id="uptstudentaddress" name="uptstudentaddress" rows="4" tabindex="13" disabled></textarea>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="uptstudentmobno">Mobile No</label>
						<input type="tel" class="form-control" id="uptstudentmobno" name="uptstudentmobno" tabindex="14" pattern="^[789]\d{9}$" disabled />
					</div>
				</div>		
				<div class="col-sm-3">
					<div class="form-group">
						<label for="uptstudentmail">Email</label>
						<input type="email" class="form-control" id="uptstudentmail" name="uptstudentmail" tabindex="15" disabled />
					</div>
				</div>		
				<div class="col-sm-3">
					<div class="form-group">
						<label for="stufiles">Student Profile Photo</label>
					<div class="input-group">
						<span class="input-group-btn">
							<button id="studpfilebuttonbrowse" name="studpfilebuttonbrowse" type="button" class="btn btn-default" tabindex="16" disabled>
								<span class="glyphicon glyphicon-file"></span>
							</button>
						</span>
						<!-- studpfile -> StudentDisplayPhotoFile -->
						<input type="file" style="display: none;" id="studpfile" name="studpfile" accept="image/jpeg" disabled />
						<input type="text" id="studpfileinputname" name="studpfileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(jpg|jpeg)$" style="pointer-events: none;" disabled />
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" disabled="disabled" id="studpfilebuttondelete" name="studpfilebuttondelete" tabindex="17">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</span>
					</div><!-- End Input Group -->
					</div>
				</div>		
								
			</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group" align="right">
					<button id="uptupdatebtn" name="uptupdatebtn" type="submit" class="btn btn-info btn-md" tabindex="18" disabled>Update</button>
					<button id="uptclrbtn" name="uptclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="19">Clear</button>
					<button id="uptcnclbtn" name="uptcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="20">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

</form>