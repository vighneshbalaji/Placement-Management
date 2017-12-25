<form id="companydetailuploadform" name="companydetailuploadform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Material Upload</strong></div>
			<div class="panel-body">
			
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
				
							<label for="companydetailuploadcompany">Company</label>
							<select class="form-control" name="companydetailuploadcompany" id="companydetailuploadcompany" tabindex="1" autofocus required>
							<option value="" selected>Select One</option>
							<?php
								$placompanylistqr1 = "SELECT `companyid`,`companyname` FROM `company`";
								
								if(! $placompanylistres1 = $db->query($placompanylistqr1)) die("Unable To connect placement registration form Query 1 ");
								
								while($placompanylistrow1 = $placompanylistres1->fetch_assoc())
								{
							?>
								<option value="<?php echo $placompanylistrow1["companyname"] ?>" ><?php echo ucfirst($placompanylistrow1["companyname"]); ?></option>
							<?php
								}
							?>
							</select>
						</div>
						<div class="col-sm-6">
				
							<label for="companydetailuploadfile">Company Detail (File type must be .txt or .mvb)</label>
							<div class="input-group">
								<span class="input-group-btn">
									<button id="companydetailuploadfilebuttonbrowse" name="companydetailuploadfilebuttonbrowse" type="button" class="btn btn-default" tabindex="1">
										<span class="glyphicon glyphicon-file"></span>
									</button>
								</span>
								<input type="file" style="display: none;" id="companydetailuploadfile" name="companydetailuploadfile" accept="text/plain, .mvb" />
								<input type="text" id="companydetailuploadfileinputname" name="companydetailuploadfileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(txt|mvb)$" style="pointer-events: none; z-index: 0;" />
								<span class="input-group-btn">
									<button type="reset" class="btn btn-default" disabled="disabled" id="companydetailuploadfilebuttonreset" name="companydetailuploadfilebuttonreset" tabindex="2">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
								</span>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default" disabled="disabled" id="companydetailuploadfilebuttonupload" name="companydetailuploadfilebuttonupload" tabindex="3" style="z-index: 0;">
										<span class="glyphicon glyphicon-upload"></span>
									</button>
								</span>
							</div><!-- End Input Group -->
						</div>
						</div>
	
				</div><!-- End Form Group -->
				
			</div><!-- End Files Upload Panel Body -->
			
		</div>
		
		
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Files</strong></div>
			<div class="panel-body">
					<div id="fileTreeDemo" class="demo"></div>				
					<input type="hidden" name="deletefilepath" id="deletefilepath" />
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-danger btn-block" id="companydetailuploadfilebuttondelete" name="companydetailuploadfilebuttondelete" tabindex="4" onclick="document.getElementById('companydetailuploadcompany').required = false;" >
						<span class="glyphicon glyphicon-trash"></span>
					</button>
				</div>
			</div>
			
		</div><!-- End Files Upload Panel -->
	</div>
</form>

