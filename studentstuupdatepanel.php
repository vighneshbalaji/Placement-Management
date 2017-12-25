<form id="stuupdatestuform" name="stuupdatestuform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Student Detail Update Form</div>
	<div class="panel-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="uptstustudentname">Student Name</label>
						<input type="text" class="form-control" id="uptstustudentname" name="uptstustudentname" tabindex="1" value="<?php echo $studentdetailrow1["studentname"]; ?>" readonly />
					</div>
				</div>				
				<div class="col-sm-4">
					<div class="form-group">
						<label for="uptstustudentmobno">Mobile No</label>
						<input type="tel" class="form-control" id="uptstustudentmobno" name="uptstustudentmobno" tabindex="2" pattern="^[789]\d{9}$" value="<?php echo $studentdetailrow1["mobileno"]; ?>" required />
					</div>
				</div>		
				<div class="col-sm-4">
					<div class="form-group">
						<label for="uptstustudentmail">Email</label>
						<input type="email" class="form-control" id="uptstustudentmail" name="uptstustudentmail" tabindex="3" value="<?php echo $studentdetailrow1["email"]; ?>" required />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="uptstustudentaddress">Address</label>
						<textarea class="form-control" id="uptstustudentaddress" name="uptstustudentaddress" rows="4" tabindex="4" required ><?php echo $studentdetailrow1["address"]; ?></textarea>
					</div>
				</div>	
			</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group" align="right">
					<button id="uptupdatebtn" name="uptstuupdatebtn" type="submit" class="btn btn-info btn-md" tabindex="5">Update</button>
					<button id="uptclrbtn" name="uptstuclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="6">Clear</button>
					<button id="uptcnclbtn" name="uptstucnclbtn" type="button" class="btn btn-danger btn-md" tabindex="7">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

</form>