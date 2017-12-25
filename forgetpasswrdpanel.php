<form id="forgetpasswrdform" name="forgetpasswrdform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Forget Password Form</div>
	<div class="panel-body">
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<label for="forgetpasswrdmailid">Mail - ID</label>
						<input type="email" class="form-control" id="forgetpasswrdmailid" name="forgetpasswrdmailid" tabindex="1" required />
					</div>
				</div>				
				<div class="col-sm-4">
					<div class="form-group">
						<div class="form-group" align="center" style="padding-top: 23px;">
							<button id="forgetpasswrdsubbtn" name="forgetpasswrdsubbtn" type="submit" class="btn btn-info btn-md" tabindex="2">Submit</button>
							<button id="forgetpasswrdclrbtn" name="forgetpasswrdclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="3">Clear</button>
							<button id="forgetpasswrdcnclbtn" name="forgetpasswrdcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="4">Cancel</button>
						</div>						
					</div>
				</div>
			</div>
		</div>
</div>

</form>