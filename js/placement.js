$(document).ready(function(){
	
	$("#sidenavicon").click(function(){
		$("#mySidenav").addClass("opennav");				
		$("#main").addClass("openmain");
		$("#mask").addClass("openmask");
	});		
	
	$("#closeBtn, #mask").click(function(){
		$("#mySidenav").removeClass("opennav");
		$("#main").removeClass("openmain");
		$("#mask").removeClass("openmask");		
	});
	/* Search Box Validator */
	$("#usrchstr").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Enter Correct Company");			
	}); 
	
	
	$("#bdepartment,#uptdepartment,#plaresultuptdepartment, #plaresultcorrectiondepartment").change(function(){
		if(this.value == "")$("#bsection,#uptsection,#uptyearofjoin,#plaresultuptsection,#plaresultuptyearofjoin,#plaresultcorrectionyearofjoin,#plaresultcorrectionsection").prop("disabled",true);
			//$("#bsection").attr("disabled","disabled"); 
		else $("#bsection,#uptsection,#uptyearofjoin,#plaresultuptsection,#plaresultuptyearofjoin,#plaresultcorrectionyearofjoin,#plaresultcorrectionsection").prop("disabled",false);
			//$("#bsection").removeAttr("disabled");
	});
		
	
	$("#regcnclbtn, #uptcnclbtn, #plaregcnclbtn, #plauptcnclbtn, #stuplaregcnclbtn, #uptstucnclbtn, #studentreportcnclbtn, #plareportcnclbtn, #plaresultuptcnclbtn, #plaresultreportcnclbtn, #plaremovecnclbtn, #companyregcnclbtn, #forgetpasswrdcnclbtn, #resetpasswrdcnclbtn").click(function(){
		$(location).attr("href","index.php");		
	});
	
	$("#uptclrbtn").click(function(){
				$("#uptstudentname").prop("disabled",true);
				$("#uptstudentsslc").prop("disabled",true);
				$("#uptstudenthsc").prop("disabled",true);
				$("#uptstudentug").prop("disabled",true);
				$("#uptstudentarr").prop("disabled",true);
				$("#uptstudentaddress").prop("disabled",true);
				$("#uptstudentmobno").prop("disabled",true);
				$("#uptstudentmail").prop("disabled",true);
				$("#uptstudentid").prop("disabled",true);
				$("#studpfilebuttondelete").prop("disabled",true);
	});
	
	
	$("#lusrid, #lusrpass").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Enter "+$(this).attr("placeholder"));
		else if(this.validity.patternMismatch)
			this.setCustomValidity("User Id Always Starts with character & Minimum User Id Contains 4 Characters");
		
	});
	
	$("#lusrtype, #binstitution ,#byearofjoin, #bdepartment, #bsection, #bnstudents").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').html());			
	}); 
	
	$("#uptdepartment, #uptyearofjoin, #uptsection, #uptstudentid, #uptstudentname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').html());			
	}); 
	
	$("#plaregcompany, #plaregsslc, #plareghsc, #plaregug, #plaregarrear, #plaregjobinfo, #plaregdate").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').html());			
	}); 
	
	
	/* $("#binstitution ,#byearofjoin, #bdepartment, #bsection, #bnstudents").on("invalid",function(){
		this.setCustomValidity(this.validity.valueMissing ? "Please Choose "+$('label[for="' + this.id + '"]').html() : '');		
	}); */
	
	
	$("#alert-nostudentid-close").click(function(){
		$("#alert-stuupdate").removeClass("open-alert-nostudent");
	});
	
	/* $("#mysidenavdropdowntitle").click(function(){
		if( $("#mysidenavdropdown").hasClass("sidenavdropdown-open") )
			$("#mysidenavdropdown").removeClass("sidenavdropdown-open");
		else
			$("#mysidenavdropdown").addClass("sidenavdropdown-open");	
	});	*/
	
	// Side Nav File Upload 
	
	$("#mysidenavdropdownforprdet").hide();
	$("#mysidenavdropdowntitleforprdet").click(function(){
		$("#mysidenavdropdownforprdet").slideToggle();
	});
	
	/* sidenav Company toggle option */
	
	$("#mysidenavdropdownforcompany").hide();
	$("#mysidenavdropdowntitleforcompany").click(function(){
		$("#mysidenavdropdownforcompany").slideToggle();
	});
	
	/* sidenav student detail toggle option */
	$("#mysidenavdropdownforstudet").hide();
	$("#mysidenavdropdowntitleforstudet").click(function(){
		$("#mysidenavdropdownforstudet").slideToggle();
	});
	
	/* sidenav placement detail toggle option */
	$("#mysidenavdropdownforpladet").hide();
	$("#mysidenavdropdowntitleforpladet").click(function(){
		$("#mysidenavdropdownforpladet").slideToggle();
	});
	
	/* sidenav Report generator toggle option */
	$("#mysidenavdropdownforreportgen").hide();
	$("#mysidenavdropdowntitleforreportgen").click(function(){
		$("#mysidenavdropdownforreportgen").slideToggle();
	});
	
	/* sidenav Company Detail toggle option */
	$("#mysidenavdropdownformateup").hide();
	$("#mysidenavdropdowntitleformateup").click(function(){
		$("#mysidenavdropdownformateup").slideToggle();
	});
	
	/* sidenav Institute Detail toggle option */
	$("#mysidenavdropdownforcompanyup").hide();
	$("#mysidenavdropdowntitleforcompanyup").click(function(){
		$("#mysidenavdropdownforcompanyup").slideToggle();
	});
	
	
	
	$("#filebuttonbrowse").click(function(){
		$("#sturesumefile").click();	
	});
	
	$("#sturesumefile").on("change",function(){
		
		$("#fileinputname").val(this.files.item(0).name);
		$("#filebuttonreset").prop("disabled",false);
		$("#filebuttonupload").prop("disabled",false);
		
	});	
	
	$("#stufilesuploadform").on("reset",function(){
		$("#filebuttonreset").prop("disabled",true);
		$("#filebuttonupload").prop("disabled",true);
	});
	
	$("#fileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#fileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be pdf or doc or docx. Please Check your File.");
		
	});
	
	
	$("#stuplaregyesbtn").click(function(){
		$("#stuplaregappdiv").slideUp(1000,function(){ $("#stuplaregresdiv").slideDown(1000); });
	});
	
	$("#stuplaregnobtn").click(function(){
		$("#stuplaregresdiv").slideUp(1000,function(){ $("#stuplaregappdiv").slideDown(1000); });
	});
	
	$("#stuplauptyesbtn").click(function(){
		$("#stuplaregappdiv").slideUp(1000,function(){ $("#stuplaregresdiv").slideDown(1000); });
	});
	
	$("#stuplauptnobtn").click(function(){
		$("#stuplaregresdiv").slideUp(1000,function(){ $("#stuplaregappdiv").slideDown(1000); });
	});
	
	$("#uptstustudentmobno, #uptstustudentmail, #uptstustudentaddress, #uptstudentmobno").on("invalid change input blur",function(){
		this.setCustomValidity("");
		this.style.borderColor = "#66afe9";
		
		if(this.validity.valueMissing)
		{	this.focus();
			this.style.borderColor = "red";
			this.setCustomValidity("Please Enter "+$('label[for="' + this.id + '"]').html());
		}
		else if(this.validity.patternMismatch)
		{
			this.focus();
			this.style.borderColor = "red";
			this.setCustomValidity("Please Enter Valid Indian Mobile Number. Mobile No must be start with 9 or 8 or 7 and it must be a ten digit number.");
		}
		
	});
	
	$("#studentreportform").on("reset",function(){
		slider[0].noUiSlider.set([0,100]);
		slider[1].noUiSlider.set([0,100]);
		slider[2].noUiSlider.set([0,100]);
	});
	
	$("#plareportplacementid").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').text());			
	}); 
	
	$("#plaresultuptplacementid,#plaresultuptstudentid,#plaresultuptsection,#plaresultuptyearofjoin,#plaresultuptdepartment").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').text());			
	}); 
	
	/* Student Profile Photo */
	
	$("#studpfilebuttonbrowse").click(function(){
		$("#studpfile").click();	
	});
	
	$("#studpfile").on("change",function(){
		$("#studpfileinputname").val(this.files.item(0).name);
	});	
	
	$("#studpfileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#studpfilebuttondelete").on("click",function(){
		$("#studpfileinputname").val("");
		$("#studpfile").val("");
		$("#studpfilebuttondelete").prop("disabled",true);
	});
	
	$("#studpfileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be jpeg or jpg file. Please Check your File.");
		
	});
	
	/* End Student Profile Photo */
	
	$("#plaresultuptclrbtn").on("click",function(){
		$("#plaresultuptsection").text("");
		document.getElementById("plaresultuptstudentid[]").innerText = "";
		document.getElementById("plaresultuptstudentid[]").disabled = true;
		$("#plaresultuptsubbtn").prop("disabled",true);
	});
	
	$("#plaresultcorrectionclrbtn").on("click",function(){
		$("#plaresultcorrectionsection").text("");
		document.getElementById("plaresultcorrectionstudentid[]").innerText = "";
		document.getElementById("plaresultcorrectionstudentid[]").disabled = true;
		$("#plaresultcorrectionsubbtn").prop("disabled",true);
	});
	
	$("#plaremoveplacementid").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Choose "+$('label[for="' + this.id + '"]').text());			
	});

	/* Material Upload */
	
	$("#appmaterialfilebuttonbrowse").click(function(){
		$("#appmaterialfile").click();	
	});
	
	$("#appmaterialfile").on("change",function(){
		
		$("#appmaterialfileinputname").val(this.files.item(0).name);
		$("#appmaterialfilebuttonreset").prop("disabled",false);
		if($("#appmaterialcompany").val() != "")
			$("#appmaterialfilebuttonupload").prop("disabled",false);
		
	});	
	
	$("#appmaterialcompany").on("change",function(){
		if( ( $("#appmaterialfileinputname").val() != "" ) && ($("#appmaterialcompany").val() != "") )
			$("#appmaterialfilebuttonupload").prop("disabled",false);
		else
			$("#appmaterialfilebuttonupload").prop("disabled",true);
	});	
	
	$("#materialuploadform").on("reset",function(){
		$("#appmaterialfilebuttonreset").prop("disabled",true);
		$("#appmaterialfilebuttonupload").prop("disabled",true);
	});
	
	$("#appmaterialfileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#appmaterialfileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be pdf or doc or docx. Please Check your File.");
		
	});
	
	/* Company Detail Upload */
	$("#companydetailuploadfilebuttonbrowse").click(function(){
		$("#companydetailuploadfile").click();	
	});
	
	$("#companydetailuploadfile").on("change",function(){
		
		$("#companydetailuploadfileinputname").val(this.files.item(0).name);
		$("#companydetailuploadfilebuttonreset").prop("disabled",false);
		if($("#companydetailuploadcompany").val() != "")
			$("#companydetailuploadfilebuttonupload").prop("disabled",false);
		
	});	
	
	$("#companydetailuploadcompany").on("change",function(){
		if( ( $("#companydetailuploadfileinputname").val() != "" ) && ($("#companydetailuploadcompany").val() != "") )
			$("#companydetailuploadfilebuttonupload").prop("disabled",false);
		else
			$("#companydetailuploadfilebuttonupload").prop("disabled",true);
	});	
	
	$("#companydetailuploadform").on("reset",function(){
		$("#companydetailuploadfilebuttonreset").prop("disabled",true);
		$("#companydetailuploadfilebuttonupload").prop("disabled",true);
	});
	
	$("#companydetailuploadfileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#companydetailuploadfileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be pdf or doc or docx. Please Check your File.");
		
	});
	
	/* Company register */
	$("#companyregcompanyname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Enter Correct Company Name");
		else if(this.validity.patternMismatch)
			this.setCustomValidity("Entered Company already exist. Please Choose another Company");
	});
	
	$("#companyregister").on("reset",function(){
		$("#companyregcompanylogofilebuttondelete").prop("disabled",true);
		$("#companyregcompanydetailfilebuttondelete").prop("disabled",true);
	});
	
	$("#companyregcompanyname, #companyregcompanylogofilebuttonbrowse, #companyregcompanydetailfilebuttonbrowse").on("blur",function(){
		 if(($("#companyregcompanyname").val() != "") && ($("#companyregcompanylogofileinputname").val() != "") && ($("#companyregcompanydetailfileinputname").val() != "")) 
		 {
			 $("#companyregregisterbtn").prop("disabled",false);
			 $("#companyregregisterbtn").focus();
		 }
		else
			$("#companyregregisterbtn").prop("disabled",true);
	});
	/* End Company Register */
	
	/* Company Logo File */
	
	$("#companyregcompanylogofilebuttonbrowse").click(function(){
		$("#companyregcompanylogofile").click();
	});
	
	$("#companyregcompanylogofile").on("change",function(){
		$("#companyregcompanylogofileinputname").val(this.files.item(0).name);
		$("#companyregcompanylogofilebuttondelete").prop("disabled",false);
	});	
	
	$("#companyregcompanylogofileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#companyregcompanylogofilebuttondelete").on("click",function(){
		$("#companyregcompanylogofileinputname").val("");
		$("#companyregcompanylogofile").val("");
		$("#companyregcompanylogofilebuttondelete").prop("disabled",true);
		$("#companyregregisterbtn").prop("disabled",true);
	});
	
	$("#companyregcompanylogofileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be jpeg or jpg file. Please Check your File.");
		
	});
	
	/* Company detail upload in company registration */
	
	$("#companyregcompanydetailfilebuttonbrowse").click(function(){
		$("#companyregcompanydetailfile").click();
	});
	
	$("#companyregcompanydetailfile").on("change",function(){
		$("#companyregcompanydetailfileinputname").val(this.files.item(0).name);
		$("#companyregcompanydetailfilebuttondelete").prop("disabled",false);
	});	
	
	$("#companyregcompanydetailfileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#companyregcompanydetailfilebuttondelete").on("click",function(){
		$("#companyregcompanydetailfileinputname").val("");
		$("#companyregcompanydetailfile").val("");
		$("#companyregcompanydetailfilebuttondelete").prop("disabled",true);
		$("#companyregregisterbtn").prop("disabled",true);
	});
	
	$("#companyregcompanydetailfileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be jpeg or jpg file. Please Check your File.");
		
	});
	
		/* Institute Detail Upload */
		
	$("#institutedetailuploadfilebuttonbrowse").click(function(){
		$("#institutedetailuploadfile").click();	
	});
	
	$("#institutedetailuploadfile").on("change",function(){
		
		$("#institutedetailuploadfileinputname").val(this.files.item(0).name);
		$("#institutedetailuploadfilebuttonreset").prop("disabled",false);
		$("#institutedetailuploadfilebuttonupload").prop("disabled",false);
		
	});	
	
	$("#institutedetailuploadform").on("reset",function(){
		$("#institutedetailuploadfilebuttonreset").prop("disabled",true);
		$("#institutedetailuploadfilebuttonupload").prop("disabled",true);
	});
	
	$("#institutedetailuploadfileinputname").on("keydown paste",function(e){
		e.preventDefault();
	});
	
	$("#institutedetailuploadfileinputname").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.patternMismatch)
			this.setCustomValidity("File Type Must be txt or mvb. Please Check your File.");
		
	});
	
	/* Reset Password */
	
	$("#resetpasswrdnewpasswrd").on("keyup",function(){
		$("#resetpasswrdrenewpasswrd").attr("pattern",$("#resetpasswrdnewpasswrd").val());
	});
	
	$("#resetpasswrdcurpasswrd, #resetpasswrdnewpasswrd, #resetpasswrdrenewpasswrd").on("invalid change input",function(){
		this.setCustomValidity("");
		
		if(this.validity.valueMissing)
			this.setCustomValidity("Please Fill "+$('label[for="' + this.id + '"]').text());
		else if(this.validity.patternMismatch)
			this.setCustomValidity("Please Check new password");
		
	});
	
	
});

function showPass(id,tid)
{
	if(tid.getAttribute("type") == "password")
	{
		tid.setAttribute("type","text");
		id.className = "glyphicon glyphicon-eye-close";
	}
	else
	{
		tid.setAttribute("type","password");
		id.className = "glyphicon glyphicon-eye-open";
	}
}


function studentIdsForPlaResult(institution,department,yearofjoin,section)
{ 
	if( (document.getElementById("plaresultuptplacementid").value != "") && (institution.value != "") && (department.value != "") && (yearofjoin.value != "") && (section.value != ""))
	{
		var id = Array();		
		
		var j = 0;
		
		for(var i = 0;i<section.length;i++)
		{
			if(section[i].selected == true)
				id[j++] = "s"+institution.value+yearofjoin.value.substring(2,4)+department.value+section[i].value;
		}
			
		return(id);
	}
	else
	{
		return("");
	}
	
}

function studentIdsForPlaResultCorrection(institution,department,yearofjoin,section)
{ 
	if( (document.getElementById("plaresultcorrectionplacementid").value != "") && (institution.value != "") && (department.value != "") && (yearofjoin.value != "") && (section.value != ""))
	{
		var id = Array();		
		
		var j = 0;
		
		for(var i = 0;i<section.length;i++)
		{
			if(section[i].selected == true)
				id[j++] = "s"+institution.value+yearofjoin.value.substring(2,4)+department.value+section[i].value;
		}
		return(id);
	}
	else
	{
		return("");
	}
	
}

function studentIds(institution,department,yearofjoin,section)
{ 
	if((institution.value != "") && (department.value != "") && (yearofjoin.value != "") && (section.value != ""))
	{
		var id = "";
		
		id = "s"+institution.value+yearofjoin.value.substring(2,4)+department.value+section.value;
			
		return(id);
	}
	else
	{
		return("");
	}
	
}


function alertBoxInStuUpdate(alerttxt)
{
	setTimeout(function(){
		$("#alert-stuupdate-text").html(alerttxt);
		$("#alert-stuupdate").addClass("open-alert-nostudent");
	},500); // index page alert it takes time to load so i increased time to 500 miliseconds
	
	
	
	setTimeout(function(){$("#alert-stuupdate").removeClass("open-alert-nostudent");},6500);
}
