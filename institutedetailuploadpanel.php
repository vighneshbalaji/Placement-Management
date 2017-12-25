<form id="institutedetailuploadform" name="institutedetailuploadform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

<input type="hidden" class="form-control" name="institutedetailuploadinstituteid" id="institutedetailuploadinstituteid" value="<?php echo "in".substr($_SESSION["UserId"],2); ?>" />

<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Company detail Upload</strong></div>
			<div class="panel-body">
			
				<div class="form-group">
					<div class="row">
						<div class="col-sm-12">
				
							<label for="institutedetailuploadfile">Institute Detail (File type must be .txt or .mvb)</label>
							<div class="input-group">
								<span class="input-group-btn">
									<button id="institutedetailuploadfilebuttonbrowse" name="institutedetailuploadfilebuttonbrowse" type="button" class="btn btn-default" tabindex="1">
										<span class="glyphicon glyphicon-file"></span>
									</button>
								</span>
								<input type="file" style="display: none;" id="institutedetailuploadfile" name="institutedetailuploadfile" accept="text/plain, .mvb" />
								<input type="text" id="institutedetailuploadfileinputname" name="institutedetailuploadfileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(txt|mvb)$" style="pointer-events: none; z-index: 0;" />
								<span class="input-group-btn">
									<button type="reset" class="btn btn-default" disabled="disabled" id="institutedetailuploadfilebuttonreset" name="institutedetailuploadfilebuttonreset" tabindex="2">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
								</span>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default" disabled="disabled" id="institutedetailuploadfilebuttonupload" name="institutedetailuploadfilebuttonupload" tabindex="3" style="z-index: 0;">
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
					<button type="submit" class="btn btn-danger btn-block" id="institutedetailuploadfilebuttondelete" name="institutedetailuploadfilebuttondelete" tabindex="4" >
						<span class="glyphicon glyphicon-trash"></span>
					</button>
				</div>
			</div>
			
		</div><!-- End Files Upload Panel -->
	</div>
</form>

