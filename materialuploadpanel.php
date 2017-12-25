<form id="materialuploadform" name="materialuploadform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Material Upload</strong></div>
			<div class="panel-body">
			
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
				
							<label for="appmaterialcompany">Company</label>
							<select class="form-control" name="appmaterialcompany" id="appmaterialcompany" tabindex="1" autofocus required>
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
				
							<label for="appmaterialfile">Material (File type must be .txt or .docx or .pdf)</label>
							<div class="input-group">
								<span class="input-group-btn">
									<button id="appmaterialfilebuttonbrowse" name="appmaterialfilebuttonbrowse" type="button" class="btn btn-default" tabindex="1">
										<span class="glyphicon glyphicon-file"></span>
									</button>
								</span>
								<input type="file" style="display: none;" id="appmaterialfile" name="appmaterialfile" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/pdf,text/plain" />
								<input type="text" id="appmaterialfileinputname" name="appmaterialfileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(pdf|doc|docx|txt)$" style="pointer-events: none; z-index: 0;" />
								<span class="input-group-btn">
									<button type="reset" class="btn btn-default" disabled="disabled" id="appmaterialfilebuttonreset" name="appmaterialfilebuttonreset" tabindex="2">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
								</span>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default" disabled="disabled" id="appmaterialfilebuttonupload" name="appmaterialfilebuttonupload" tabindex="3" style="z-index: 0;">
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
					<button type="submit" class="btn btn-danger btn-block" id="appmaterialfilebuttondelete" name="appmaterialfilebuttondelete" tabindex="4" onclick="document.getElementById('appmaterialcompany').required = false;" >
						<span class="glyphicon glyphicon-trash"></span>
					</button>
				</div>
			</div>
			
		</div><!-- End Files Upload Panel -->
	</div>
</form>

