<form id="stufilesuploadform" name="stufilesuploadform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="row">
	<div class="col-sm-8">
	
		<div class="panel panel-primary">
		
			<div class="panel-heading"><strong>Students Files Upload</strong></div>
			<div class="panel-body">
			
				<div class="form-group">
					<label for="stufiles">Resume / Bio - Data (File type must be .doc or .docx or .pdf)</label>
					<div class="input-group">
						<span class="input-group-btn">
							<button id="filebuttonbrowse" name="filebuttonbrowse" type="button" class="btn btn-default" tabindex="1">
								<span class="glyphicon glyphicon-file"></span>
							</button>
						</span>
						<input type="file" style="display: none;" id="sturesumefile" name="sturesumefile" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/pdf" />
						<input type="text" id="fileinputname" name="fileinputname" placeholder="File not selected" class="form-control" pattern="^(.+)\.(pdf|doc|docx)$" style="pointer-events: none;" />
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default" disabled="disabled" id="filebuttonreset" name="filebuttonreset" tabindex="2">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</span>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default" disabled="disabled" id="filebuttonupload" name="filebuttonupload" tabindex="3">
								<span class="glyphicon glyphicon-upload"></span>
							</button>
						</span>
					</div><!-- End Input Group -->
	
				</div><!-- End Form Group -->
				
			</div> <!-- End Files Upload Panel Body -->
			
		</div><!-- End Files Upload Panel -->
		
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary">
		
			<div class="panel-heading"><strong>Students Files</strong></div>
			<div class="panel-body">
					<div id="fileTreeDemo" class="demo"></div>				
					<input type="hidden" name="deletefilepath" id="deletefilepath" />
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-danger btn-block" id="filebuttondelete" name="filebuttondelete" tabindex="4">
						<span class="glyphicon glyphicon-trash"></span>
					</button>
				</div>
			</div>
			
		</div>
	</div>
</form>

