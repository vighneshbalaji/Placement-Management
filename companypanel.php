<div class="panel-group">
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-primary">
			<div class="company-detail-head panel-heading" style="background-color: aliceblue; overflow-y: hidden;" align="center">
				<img src="companydetails/<?php echo $UserSearchedCompany."/".$UserSearchedCompany.".png"; ?>"
				alt="<?php echo $UserSearchedCompany; ?>" class="img-responsive" style="height: 80px;" />
			</div>
			<div class="panel-body" style="height: 410px; overflow-y: scroll;" align="justify" ><?php require("php/companyfileread.php") ?> </div>
		</div>
		</div>
		
		<div class="col-sm-3">
		  <div class="panel panel-primary">
			<div class="panel-heading">
				Lastest Aptitude Materials:
			</div>
			<div class="panel-body company-material-panel-body">
				<div id="CompanyAppFilesTree" class="demo pla-material-panel-body-demo"></div>
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<a href="javascript:void(0)" id="appfilelink" name="appfilelink" download>
						<button type="button" class="btn btn-info btn-block" id="filebuttondownload" name="filebuttondownload" tabindex="4" disabled>
							<span class="glyphicon glyphicon-cloud-download"></span>
						</button>
					</a>
				</div>
			</div>
		  </div>
		</div>
	</div>
</div>