<form id="resetpasswrdform" name="resetpasswrdform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Reset Password Form</div>
	<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2">
							<label for="resetpasswrdcurpasswrd">Current Password</label>
						</div>
						<div class="col-sm-10">
							<div class="input-group"> <!-- Current Password -->
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" tabindex="1" title="Password" class="form-control" name="resetpasswrdcurpasswrd" id="resetpasswrdcurpasswrd" placeholder="Current Password" required />
							<div class="input-group-btn">
								   <button class="btn btn-default" style="height: 34px; z-index: 0;" type="button" onmousedown="showPass(cureyepass,resetpasswrdcurpasswrd);" onmouseup="showPass(cureyepass,resetpasswrdcurpasswrd);" >
									<i name="cureyepass" id="cureyepass" class="glyphicon glyphicon-eye-open"></i>
								   </button>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2">
							<label for="resetpasswrdnewpasswrd">New Password</label>
						</div>
						<div class="col-sm-10">
							<div class="input-group"> <!-- New Password -->					
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" tabindex="2" title="Password" class="form-control" name="resetpasswrdnewpasswrd" id="resetpasswrdnewpasswrd" placeholder="New Password" required />
							<div class="input-group-btn">
								   <button class="btn btn-default" style="height: 34px; z-index: 0;" type="button" onmousedown="showPass(neweyepass,resetpasswrdnewpasswrd);" onmouseup="showPass(neweyepass,resetpasswrdnewpasswrd);" >
									<i name="neweyepass" id="neweyepass" class="glyphicon glyphicon-eye-open"></i>
								   </button>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2">
							<label for="resetpasswrdrenewpasswrd">Re-enter New Password</label>
						</div>
						<div class="col-sm-10">
							<div class="input-group"> <!-- Re-enter New Password -->
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" tabindex="3" title="Password" class="form-control" name="resetpasswrdrenewpasswrd" id="resetpasswrdrenewpasswrd" placeholder="Re-enter New Password" required />
							<div class="input-group-btn">
								   <button class="btn btn-default" style="height: 34px; z-index: 0;" type="button" onmousedown="showPass(reneweyepass,resetpasswrdrenewpasswrd);" onmouseup="showPass(reneweyepass,resetpasswrdrenewpasswrd);" >
									<i name="reneweyepass" id="reneweyepass" class="glyphicon glyphicon-eye-open"></i>
								   </button>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div align="right">
					<button id="resetpasswrdsubbtn" name="resetpasswrdsubbtn" type="submit" class="btn btn-info btn-md" tabindex="4">Submit</button>
					<button id="resetpasswrdclrbtn" name="resetpasswrdclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="5">Clear</button>
					<button id="resetpasswrdcnclbtn" name="resetpasswrdcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="6">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

</form>