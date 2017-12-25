function changeSectionList(departmentvalue)
{	
	if (departmentvalue.length == 0) { 
		document.getElementById("bsection").innerHTML = "<option value='' selected>Select One</option>";
		return;
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				document.getElementById("bsection").innerHTML = this.responseText;
			}
		  };
		  xmlhttp.open("GET","database/sectionoptionajax.php?departmentvalue="+departmentvalue,true);
		  xmlhttp.send();
		}
}

function changeSectionListInUpdate(departmentvalue)
{	
	if (departmentvalue.length == 0) { 
		document.getElementById("uptsection").innerHTML = "<option value='' selected>Select One</option>";
		return;
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				var list = "";
				var year ;
				var dt = new Date();
				
				year = this.responseText.substr(0,1);
				list = this.responseText.substr(1,this.responseText.length);
				if(dt.getMonth() < 6)
					document.getElementById("uptyearofjoin").max = ((dt.getFullYear() - 1) - (year - 1)) + "-06";
				else
					document.getElementById("uptyearofjoin").max = (dt.getFullYear() - (year - 1)) + "-06";
				
				document.getElementById("uptsection").innerHTML = list;
			}
		  };
		  xmlhttp.open("GET","database/sectionandyearinuptajax.php?departmentvalue="+departmentvalue,true);
		  xmlhttp.send();
		}
}

function viewStudentId(studentrangevalue)
{
	var alerttxt = "No such <strong>studentId</strong> is available or Incorrect choice selection";
	if (studentrangevalue.length <= 6) { 
		document.getElementById("uptstudentid").innerHTML = "<option value='' selected>Select One</option>";
		$("#uptupdatebtn").prop("disabled",true);
		alertBoxInStuUpdate(alerttxt);
		return;
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				if(this.responseText != "")					
				{
					document.getElementById("uptstudentid").innerHTML = this.responseText;
					$("#uptstudentid").prop("disabled",false);
				}
				else
				{
					$("#uptstudentid").prop("disabled",true);
					$("#uptupdatebtn").prop("disabled",true);
					document.getElementById("uptstudentid").innerHTML = "<option value='' selected>Select One</option>";
					alertBoxInStuUpdate(alerttxt);
				}
				
			}
		  };
		  
		  xmlhttp.open("GET","database/studentidinuptajax.php?studentrangevalue="+studentrangevalue,true);
		  xmlhttp.send();
		}
}

function viewStudentDetails(studentid)
{
	var alerttxt = "Invalid StudentId or Please Choose Select Correct <strong>studentId</strong>";
	if (studentid.length == 0) { 
		/* Content for if studentid is not available in student table */
		$("#uptupdatebtn").prop("disabled",true);
		alertBoxInStuUpdate(alerttxt);
		return;
	}
	else{
		
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				var result = this.responseText.split("_");
				
				document.getElementById("uptstudentname").value = result[0];
				document.getElementById("uptstudentsslc").value = result[1];
				document.getElementById("uptstudenthsc").value = result[2];
				document.getElementById("uptstudentug").value = result[3];
				document.getElementById("uptstudentarr").value = result[4];
				document.getElementById("uptstudentaddress").value = result[5];
				document.getElementById("uptstudentmobno").value = result[6];
				document.getElementById("uptstudentmail").value = result[7];
				
				$("#studpfile").prop("disabled",false);
				$("#studpfileinputname").prop("disabled",false);
				$("#studpfilebuttonbrowse").prop("disabled",false);
				
				if(result.length == 9)
				{										
					document.getElementById("studpfileinputname").value = result[8];
				}
				else{
					document.getElementById("studpfileinputname").value = "";
				}
						
				$("#uptstudentname").prop("disabled",false);
				$("#uptstudentsslc").prop("disabled",false);
				$("#uptstudenthsc").prop("disabled",false);
				$("#uptstudentug").prop("disabled",false);
				$("#uptstudentarr").prop("disabled",false);
				$("#uptstudentaddress").prop("disabled",false);
				$("#uptstudentmobno").prop("disabled",false);
				$("#uptstudentmail").prop("disabled",false);
				$("#uptupdatebtn").prop("disabled",false);
				
				if(result.length == 9)
					$("#studpfilebuttondelete").prop("disabled",false);
				else
					$("#studpfilebuttondelete").prop("disabled",true);
			}
		  };
		  xmlhttp.open("GET","database/studentdetailinuptajax.php?studentid="+studentid,true);
		  xmlhttp.send();
		}
	
	
}

function viewPlacementDetails(placementid)
{
	var alerttxt = "Invalid Placement & Company Please Choose Correct One";
	if (placementid.length == 0) { 
		/* Content for if placementid is not available in student table */
		$("#plauptupdatebtn").prop("disabled",true);
		alertBoxInStuUpdate(alerttxt);
		return;
	}
	else{
		
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				var result = this.responseText.split("_");
				
				document.getElementById("plauptcompany").value = result[0];
				document.getElementById("plauptsslc").value = result[1];
				document.getElementById("plaupthsc").value = result[2];
				document.getElementById("plauptug").value = result[3];
				document.getElementById("plauptarrear").value = result[4];
				document.getElementById("plauptjobinfo").value = result[5];
				document.getElementById("plauptdate").value = result[6];
				document.getElementById("plauptplacementinfo").value = result[7];
								
				$("#plauptupdatebtn").prop("disabled",false);
			}
		  };
		  xmlhttp.open("GET","database/placementdetailinuptajax.php?placementid="+placementid,true);
		  xmlhttp.send();
		}
	
}

function changeSectionListInPlaResultUpdate(departmentvalue)
{	
	if (departmentvalue.length == 0) { 
		//document.getElementById("plaresultuptsection").innerHTML = "<option value='' selected>Select One</option>";
		return;
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				var list = "";
				var year ;
				var dt = new Date();
				
				year = this.responseText.substr(0,1);
				list = this.responseText.substr(1,this.responseText.length);
				if(dt.getMonth() < 6)
					document.getElementById("plaresultuptyearofjoin").max = ((dt.getFullYear() - 1) - (year - 1)) + "-06";
				else
					document.getElementById("plaresultuptyearofjoin").max = (dt.getFullYear() - (year - 1)) + "-06";
				
				document.getElementById("plaresultuptsection").innerHTML = list;
			}
		  };
		  xmlhttp.open("GET","database/sectionandyearinuptajax.php?departmentvalue="+departmentvalue,true);
		  xmlhttp.send();
		}
}

function viewStudentIdInPlaResultUpdate(studentrangevalue,placementid)
{
	var value = "";
		  for(var i = 0; i < studentrangevalue.length;i++)
		  {
			  value += "studentrangevalue[]="+studentrangevalue[i]+"&";
		  }
		  value = value.substring(0,(value.length)-1);
		  placementid = "placementid="+placementid+"&";
		  
	var alerttxt = "No such <strong>studentId</strong> is available or Incorrect choice selection";
	if (studentrangevalue.length <= 0) { 
		document.getElementById("plaresultuptstudentid[]").disabled = true;
		$("#plaresultuptsubbtn").prop("disabled",true);
		alertBoxInStuUpdate(alerttxt);
		return;
	}
	else{	  		  
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				if(this.responseText != "")					
				{
					document.getElementById("plaresultuptstudentid[]").innerHTML = this.responseText;
					document.getElementById("plaresultuptstudentid[]").disabled = false;
						
					$("#plaresultuptsubbtn").prop("disabled",false);
				}
				else
				{
					document.getElementById("plaresultuptstudentid[]").disabled = true;
					alertBoxInStuUpdate(alerttxt);
				}
				
			}
		  };
		  
		  xmlhttp.open("GET","database/studentidinplaresultuptajax.php?"+placementid+value,true);
		  xmlhttp.send();
		}
}

function changeSectionListInPlaResultCorrection(departmentvalue)
{	
	if (departmentvalue.length == 0) { 
		//document.getElementById("plaresultcorrectionsection").innerHTML = "<option value='' selected>Select One</option>";
		return;
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				var list = "";
				var year ;
				var dt = new Date();
				
				year = this.responseText.substr(0,1);
				list = this.responseText.substr(1,this.responseText.length);
				if(dt.getMonth() < 6)
					document.getElementById("plaresultcorrectionyearofjoin").max = ((dt.getFullYear() - 1) - (year - 1)) + "-06";
				else
					document.getElementById("plaresultcorrectionyearofjoin").max = (dt.getFullYear() - (year - 1)) + "-06";
				
				document.getElementById("plaresultcorrectionsection").innerHTML = list;
			}
		  };
		  xmlhttp.open("GET","database/sectionandyearinuptajax.php?departmentvalue="+departmentvalue,true);
		  xmlhttp.send();
		}
}

function viewStudentIdInPlaResultCorrection(studentrangevalue,placementid)
{
	var value = "";
		  for(var i = 0; i < studentrangevalue.length;i++)
		  {
			  value += "studentrangevalue[]="+studentrangevalue[i]+"&";
		  }
		  value = value.substring(0,(value.length)-1);
		  placementid = "placementid="+placementid+"&";
		  
	var alerttxt = "No such <strong>studentId</strong> is available or Incorrect choice selection";
	if (studentrangevalue.length <= 0) { 
		document.getElementById("plaresultcorrectionstudentid[]").disabled = true;
		$("#plaresultcorrectionsubbtn").prop("disabled",true);
		alertBoxInStuUpdate(alerttxt);
		return;
	}
	else{	  		  
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				if(this.responseText != "")					
				{
					document.getElementById("plaresultcorrectionstudentid[]").innerHTML = this.responseText;
					document.getElementById("plaresultcorrectionstudentid[]").disabled = false;
						
					$("#plaresultcorrectionsubbtn").prop("disabled",false);
				}
				else
				{
					document.getElementById("plaresultcorrectionstudentid[]").disabled = true;
					alertBoxInStuUpdate(alerttxt);
				}
				
			}
		  };
		  
		  xmlhttp.open("GET","database/studentidinplaresultcorrectionajax.php?"+placementid+value,true);
		  xmlhttp.send();
		}
}

function companyInAvailable(companyname)
{	
	if (companyname.length == 0) { 
		alertBoxInStuUpdate("Please enter Company name");
		document.getElementById("companyregcompanyname").focus();
	}
	else{
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } 
		  else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		  xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status==200) {
				if(this.responseText == true)
				{
					alertBoxInStuUpdate("Entered Company name is already available. Please enter another name");
					document.getElementById("companyregcompanyname").value = "";
					document.getElementById("companyregcompanyname").focus();
				}
			}
		  };
		  xmlhttp.open("GET","database/companynameintableajax.php?companyname="+companyname,true);
		  xmlhttp.send();
		}
}
