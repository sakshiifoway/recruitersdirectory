// JavaScript Document
function chk_SendResume()
{
	//alert('asd');
	var err = "";
	var rtn = true;
	if(document.sendresume.fullname.value=="" || document.sendresume.fullname.value=="* Name")
	{
		err+= "Please enter name.\n";
		rtn = false;
	}
	if(document.sendresume.email.value=="" || document.sendresume.email.value=="* Email")
	{
		err+="Please enter email address.\n";
		rtn = false;
	}
	if(document.sendresume.email.value!="" && (document.sendresume.email.value.indexOf('@',0) == -1 || document.sendresume.email.value.indexOf('.',0) == -1))
	{
	   err+="Please enter valid email address.\n";	  
	   rtn = false;
	} 	
	if(document.sendresume.message.value=="" || document.sendresume.message.value=="* Comments")
	{
		err+="Please add comment.\n";		
		rtn = false;
	}	
	//alert(err);
	if(err ==""){
		document.sendresume.hidn.value="1";
		overlay();
		document.sendresume.submit();	
	}else{
		alert(err);
		return rtn;
	}
}

function CheckHomeContact(){
	
	var err = "";
	var rtn = true;
	
	if($("#hcontact_name").val() == ""){
		err+= "Please enter name.\n";
		rtn = false;
	}
	if($("#email").val() == ""){
		err+= "Please enter email address.\n";
		rtn = false;
	}
	if($("#complain_details").val() == ""){
		err+= "Please add company details.\n";
		rtn = false;
	}
	if(err ==""){}
	else{
		alert(err);
		return rtn;
	}	
}

function checkFrm()
{
	var retn = true;
	var contact_name = document.getElementById("contact_name");
	var address = document.getElementById("address");
	var phone = document.getElementById("phone");
	var city = document.getElementById("city");
	var email = document.getElementById("email");
	var zip = document.getElementById("zip");
	var capcha_code = document.getElementById("capcha_code");
	
	if(contact_name.value == "")
	{
		document.getElementById("contact_name_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("contact_name_error").innerHTML = "";
	}
	if(address.value == "")
	{
		document.getElementById("address_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("address_error").innerHTML = "";
	}
	if(phone.value == "")
	{
		document.getElementById("phone_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("phone_error").innerHTML = "";
	}
	if(city.value == "")
	{
		document.getElementById("city_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("city_error").innerHTML = "";
	}
	if(email.value == "")
	{
		document.getElementById("email_error").innerHTML = "The field is required.";
		retn = false;
	}
	else if(email.value.indexOf('@',0) == -1 || email.value.indexOf('.',0) == -1)
	{
		document.getElementById("email_error").innerHTML = "The e-mail address entered is invalid.";
		retn = false;
	}
	else{
		document.getElementById("email_error").innerHTML = "";
	}
	if(zip.value == "")
	{
		document.getElementById("zip_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("zip_error").innerHTML = "";
	}
	if(capcha_code.value == '')
	{
		document.getElementById("capcha_code_error").innerHTML = "The field is required.";
		retn = false;
	}
	else{
		document.getElementById("capcha_code_error").innerHTML = "";
	}	
	return retn;
}