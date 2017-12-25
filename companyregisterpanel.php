<form id="companyregister" name="companyregister" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

	<div class="panel panel-primary">
		<div class="panel-heading">Registration Form</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="companyregcompanyname">Company Name</label>
						<input type="text" class="form-control" id="companyregcompanyname" name="companyregcompanyname" tabindex="1" 
						onblur="companyInAvailable(this.value);"
						required />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="companyregcompanylogofile">Company Logo File(File Extension must be a .png)</label>
					<div class="input-group">
						<span class="input-group-btn">
							<button id="companyregcompanylogofilebuttonbrowse" name="companyregcompanylogofilebuttonbrowse" type="button" class="btn btn-default" tabindex="2" >
								<span class="glyphicon glyphicon-file"></span>
							</button>
						</span>
						<!-- companyregfile -> CompanyLogoPhotoFile -->
						<input type="file" style="display: none;" id="companyregcompanylogofile" name="companyregcompanylogofile" accept="image/png" />
						<input type="text" id="companyregcompanylogofileinputname" name="companyregcompanylogofileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(png)$" style="pointer-events: none;" />
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" disabled="disabled" id="companyregcompanylogofilebuttondelete" name="companyregcompanylogofilebuttondelete" tabindex="17">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</span>
					</div><!-- End Input Group -->
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="companyregcompanydetailfile">Company Detail File(File Extension must be a .txt or .mvb)</label>
					<div class="input-group">
						<span class="input-group-btn">
							<button id="companyregcompanydetailfilebuttonbrowse" name="companyregcompanydetailfilebuttonbrowse" type="button" class="btn btn-default" tabindex="3" >
								<span class="glyphicon glyphicon-file"></span>
							</button>
						</span>
						<!-- companyregfile -> companydetailFile -->
						<input type="file" style="display: none;" id="companyregcompanydetailfile" name="companyregcompanydetailfile" accept="text/plain, .mvb" />
						<input type="text" id="companyregcompanydetailfileinputname" name="companyregcompanydetailfileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(txt|mvb)$" style="pointer-events: none;" />
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" disabled="disabled" id="companyregcompanydetailfilebuttondelete" name="companyregcompanydetailfilebuttondelete" tabindex="17">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</span>
					</div><!-- End Input Group -->
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div align="right">
				<button id="companyregregisterbtn" name="companyregregisterbtn" type="submit" class="btn btn-info btn-md" tabindex="4" disabled>Register</button>
				<button id="companyregclrbtn" name="companyregclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="5" >Clear</button>
				<button id="companyregcnclbtn" name="companyregcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="6">Cancel</button>
			</div>
		</div>
	</div>

		